@extends('layouts.layout')

@section('body')
<!-- Masthead-->
<header class="masthead" style="--url: url({{ asset('/img/header-bg.jpg') }})">
    <div class="container">
        <div class="masthead-subheading">Welcome To Our Kitchen!</div>
        <div class="masthead-heading text-uppercase">Are you ready to cook?</div>
        <a class="btn btn-warning text-white btn-xl text-uppercase" href="#recipe">Teach me</a>
    </div>
</header>
<!-- Recipe Grid-->
<section class="page-section bg-light" id="recipe">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Recipies</h2>
            <h3 class="section-subheading text-muted">Look at our most popular recipies.</h3>
        </div>
        <div class="row">
          @for ($i = 0; $i < $recipes->count(); $i++)
          <div class="col-lg-4 col-sm-6 mb-4 stretch">
            <div class="recipe-item stretch flex-column">
                <a class="recipe-link" data-bs-toggle="modal" href="#recipeModal{{ $i + 1 }}">
                    <div class="recipe-hover">
                        <div class="recipe-hover-content"><h4>More</h4></div>
                    </div>
                    <img class="img-fluid" src="{{ $recipes[$i]->img ? url('/storage/images/'.$recipes[$i]->img) : asset('/img/default-image.jpg') }}" alt="..." />
                </a>
                <div class="recipe-caption h-100 flex-column">
                    <div class="recipe-caption-heading">{{$recipes[$i]->name}}</div>
                    <div class="recipe-caption-subheading text-muted">{{explode('. ' ,$recipes[$i]->description)[0]}}</div>
                </div>
            </div>
          </div>
          @endfor
        </div>
    </div>
</section>
<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Our goals</h2>
            <h3 class="section-subheading text-muted">We want to bring joy and happines to the world with our work.</h3>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-cutlery fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Tasty recipies</h4>
                <p class="text-muted">Explore out most tasty, easy-to-cook and beautiful dishes with recipes and their ingredients.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Digital catalogue</h4>
                <p class="text-muted">Explore and save your recipes from any device with our cloud.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-book fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">Large variety</h4>
                <p class="text-muted">There are thousands of different recipes in the world. Find your personal best with ingredients you have.</p>
            </div>
        </div>
    </div>
</section>
<!-- Team-->
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
            <h3 class="section-subheading text-muted">Information Technologies specialists ready to take the world on.</h3>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('/img/team/1.jpg') }}" alt="..." />
                    <h4>Andrew Berezniuk</h4>
                    <p class="text-muted">Moral support</p>
                    <a class="btn btn-dark btn-social mx-2" href="https://t.me/im_dron"><i class="fab fa-telegram"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/imdron"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/a-berezniuk/"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('/img/team/2.jpg') }}" alt="..." />
                    <h4>Denys Berezniuk</h4>
                    <p class="text-muted">Lead Trainee Full-Stack Developer</p>
                    <a class="btn btn-dark btn-social mx-2" href="https://t.me/DenyaB"><i class="fab fa-telegram"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/denya.bereznyk/"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/in/denys-berezniuk/"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('/img/team/3.jpg') }}" alt="..." />
                    <h4>Dmytro Demianyk</h4>
                    <p class="text-muted">Moral support</p>
                    <a class="btn btn-dark btn-social mx-2" href="https://t.me/r1eaktor"><i class="fab fa-telegram"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">These are our people. Team of different, proactive IT-specialists
                 sharing similiar experience and bonds to the developer of this project.</p></div>
        </div>
    </div>
</section>
<!-- Contact-->
<section class="page-section" id="contact" style="--url: url({{ asset('/img/map-image.png') }})">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">* These fields are required.</h3>
        </div>
        <!-- * * * * * * * * * * * * * * *-->
        <!-- * * SB Forms Contact Form * *-->
        <!-- * * * * * * * * * * * * * * *-->
        <!-- This form is pre-integrated with SB Forms.-->
        <!-- To make this form functional, sign up at-->
        <!-- https://startbootstrap.com/solution/contact-forms-->
        <!-- to get an API token!-->
        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control" id="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                </div>
            </div>
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center text-white mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    To activate this form, sign up at
                    <br />
                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>
            <!-- Submit error message-->
            <!---->
            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Send Message</button></div>
        </form>
    </div>
</section>
<!-- recipe Modals-->
@for ($i = 0; $i < $recipes->count(); $i++)
<div class="recipe-modal modal fade" id="recipeModal{{ $i + 1 }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog mx-auto">
      <div class="modal-content">
          <div class="close-modal" data-bs-dismiss="modal"><img src="{{ asset('/img/close-icon.svg') }}" alt="Close modal" /></div>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="">
                      <div class="modal-body">
                          <!-- Project details-->
                          <h2 class="text-uppercase">{{ $recipes[$i]->name }}</h2>
                          <p class="item-intro text-muted">{{ $recipes[$i]->description }}</p>
                          <img class="img-fluid d-block mx-auto rounded" src="{{ url('/storage/images/'.$recipes[$i]->img) }}" alt="..." />
                          <p>{!! nl2br(e($recipes[$i]->instructions)) !!}</p>
                          <p class="item-intro text-muted h3">Ingredients</p>
                          <ul class="list-inline">
                              @foreach($recipes[$i]->ingredients as $ingredient)
                              <li>
                                  <strong>{{$ingredient->ingredient->name}}</strong> -
                                  {{ $ingredient->quantity.' '.$ingredient->ingredient->measure }} ({{ $ingredient->ingredient->price * $ingredient->quantity }}$);
                              </li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endfor
@endsection
