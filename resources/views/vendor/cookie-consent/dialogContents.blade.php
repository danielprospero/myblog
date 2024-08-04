<div class="js-cookie-consent cookie-consent fixed bottom-0 inset-x-0 pb-2">
    <div class="max-w-7xl mx-auto px-6">
        <div class="p-2 rounded-lg bg-yellow-100">
            <div class="flex items-center justify-between flex-wrap">
                <div class="w-0 flex-1 items-center  md:inline">
                
                    <p class="ml-3 text-black cookie-consent__message">
                        <i class="fas fa-cookie-bite mr-2"></i>
                        {!! trans('cookie-consent::texts.message') !!}

                        <button class="js-cookie-consent-agree cookie-consent__agree cursor-pointer flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-yellow-800 bg-yellow-400 hover:bg-yellow-300">
                            {{ trans('cookie-consent::texts.agree') }}
                        </button>
                        <button>
                            <a  href="{{ route('privacy') }}" class="text-dark"
                            >Política de Privacidade</a>
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
