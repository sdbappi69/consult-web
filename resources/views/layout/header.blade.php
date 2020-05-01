<header>
    <div class="container">
        <!-- Logo & Menu -->
        <div class="l-area">

            <!-- Brand and toggle get grouped for better mobile display -->
            <nav class="navbar navbar-expand-lg navbar-header">
                <!-- Logo -->
                <a class="navbar-brand" href="index.html">
                    <img class="logo" src="{{asset('/')}}img/logo.png" alt="X-DATA">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
								<span class="navbar-toggler-icon">
									<i class="fa fa-bars"></i>
								</span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse custo-drp-res" id="navbarNav">

                    @include('layout.nav')

                </div>
            </nav>
        </div>
        <!-- SocialMedia -->
        <div class="s-area">

            @include('layout.social')

        </div>
    </div>
</header>