<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

use App\Models\User;
use Illuminate\Validation\Rule;


class AdminUsersController extends Controller
{
    private $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|max:20',
        'image' => 'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=400,max_height=400',
        'role_id' => 'required|numeric'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_dashboard.users.index', [
            'users' => User::with('role')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard.users.create', [
            'roles' => Role::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
        $user = User::create($validated);


        if($request->has('image'))
        {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $file_extension = $image->getClientOriginalExtension();
            $path = $image->store('images', 'public');

            $user->image()->create([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => $path
            ]);
        }

        return redirect()->route('admin.users.create')->with('success', 'Usuário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin_dashboard.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin_dashboard.users.edit', [
            'user' => $user,
            'roles' => Role::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->rules['password'] = 'nullable|min:3|max:20';
        $this->rules['email'] = ['required', 'email', Rule::unique('users')->ignore($user)];

        $validated = $request->validate($this->rules);
        
        if($validated['password'] === null)
            unset($validated['password']);
        else 
            $validated['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);

        $user->update($validated);

        if($request->has('image'))
        {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $file_extension = $image->getClientOriginalExtension();
            $path = $image->store('images', 'public');

            $user->image()->create([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => $path
            ]);
        }

         return redirect()->route('admin.users.edit', $user)->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( User $user)
    {
        if($user->id === auth()->user()->id)
        {
            return redirect()->route('admin.users.index')->with('error', 'Você não pode deletar a si mesmo!');
        }
        
        User::whereHas('role', function($query){
            $query->where('name', 'admin');
        })->first()->posts()->saveMany($user->posts);
        
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuário deletado com sucesso!');
    }

}
