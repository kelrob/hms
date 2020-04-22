@extends('Public.template')
@section('main')

    <div class="hero-wrap" style="background-image: url('template/images/bg_1.jpg'); background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 ftco-animate text-center">
                    <h1 class="mb-4">The most valuable thing is your Health</h1>
                    <p>We care about your health Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-services">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-4 ftco-animate py-5 nav-link-wrap">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link px-4 active" id="v-pills-master-tab" data-toggle="pill" href="#v-pills-master" role="tab" aria-controls="v-pills-master" aria-selected="true"><span class="mr-3 flaticon-cardiogram"></span> Cardiology</a>

                        <a class="nav-link px-4" id="v-pills-buffet-tab" data-toggle="pill" href="#v-pills-buffet" role="tab" aria-controls="v-pills-buffet" aria-selected="false"><span class="mr-3 flaticon-neurology"></span> Neurology</a>

                        <a class="nav-link px-4" id="v-pills-fitness-tab" data-toggle="pill" href="#v-pills-fitness" role="tab" aria-controls="v-pills-fitness" aria-selected="false"><span class="mr-3 flaticon-stethoscope"></span> Diagnostic</a>

                        <a class="nav-link px-4" id="v-pills-reception-tab" data-toggle="pill" href="#v-pills-reception" role="tab" aria-controls="v-pills-reception" aria-selected="false"><span class="mr-3 flaticon-tooth"></span> Dental</a>

                        <a class="nav-link px-4" id="v-pills-sea-tab" data-toggle="pill" href="#v-pills-sea" role="tab" aria-controls="v-pills-sea" aria-selected="false"><span class="mr-3 flaticon-vision"></span> Ophthalmology</a>

                        <a class="nav-link px-4" id="v-pills-spa-tab" data-toggle="pill" href="#v-pills-spa" role="tab" aria-controls="v-pills-spa" aria-selected="false"><span class="mr-3 flaticon-ambulance"></span> Emergency</a>
                    </div>
                </div>
                <div class="col-md-8 ftco-animate p-4 p-md-5 d-flex align-items-center">

                    <div class="tab-content pl-md-5" id="v-pills-tabContent">

                        <div class="tab-pane fade show active py-5" id="v-pills-master" role="tabpanel" aria-labelledby="v-pills-master-tab">
                            <span class="icon mb-3 d-block flaticon-cardiogram"></span>
                            <h2 class="mb-4">Cardiology Department</h2>
                            <p>Cardiology is the medical speciality dealing with the diagnosis and treatment of diseases and disorders of the heart.</p>
                            <p>Cardiologists are specialists in diseases of the heart. The biggest area of heart disease treated is coronary artery disease e.g. angina. Also treated are abnormal heart rhythms, heart failure, high blood pressure and some rarer conditions.</p>
                            {{--<p><a href="#" class="btn btn-primary">Learn More</a></p>--}}
                        </div>

                        <div class="tab-pane fade py-5" id="v-pills-buffet" role="tabpanel" aria-labelledby="v-pills-buffet-tab">
                            <span class="icon mb-3 d-block flaticon-neurology"></span>
                            <h2 class="mb-4">Neurogoly Department</h2>
                            <p>A neurologist is a medical doctor who specializes in treating diseases of the nervous system. The nervous system is made of two parts: the central and peripheral nervous system. It includes the brain and spinal cord.</p>
                            <p>Illnesses, disorders, and injuries that involve the nervous system often require a neurologist’s management and treatment.</p>
                            {{--<p><a href="#" class="btn btn-primary">Learn More</a></p>--}}
                        </div>

                        <div class="tab-pane fade py-5" id="v-pills-fitness" role="tabpanel" aria-labelledby="v-pills-fitness-tab">
                            <span class="icon mb-3 d-block flaticon-stethoscope"></span>
                            <h2 class="mb-4">Diagnostic Department</h2>
                            <p>In medicine, a differential diagnosis is the distinguishing of a particular disease or condition from others that present similar clinical features.[1] Differential diagnostic procedures are used by physicians to diagnose the specific disease in a patient, or, at least, to eliminate any imminently life-threatening conditions. Often, each individual option of a possible disease is called a differential diagnosis (e.g. acute bronchitis could be a differential diagnosis in the evaluation of a cough, even if the final diagnosis is common cold).</p>
                            {{--<p><a href="#" class="btn btn-primary">Learn More</a></p>--}}
                        </div>

                        <div class="tab-pane fade py-5" id="v-pills-reception" role="tabpanel" aria-labelledby="v-pills-reception-tab">
                            <span class="icon mb-3 d-block flaticon-tooth"></span>
                            <h2 class="mb-4">Dental Departments</h2>
                            <p>Dentistry is often also understood to subsume the now largely defunct medical specialty of stomatology (the study of the mouth and its disorders and diseases) for which reason the two terms are used interchangeably in certain regions</p>
                            <p>Dental treatments are carried out by a dental team, which often consists of a dentist and dental auxiliaries (dental assistants, dental hygienists, dental technicians, as well as dental therapists). Most dentists either work in private practices (primary care), dental hospitals or (secondary care) institutions (prisons, armed forces bases, etc.).</p>
                            {{--<p><a href="#" class="btn btn-primary">Learn More</a></p>--}}
                        </div>

                        <div class="tab-pane fade py-5" id="v-pills-sea" role="tabpanel" aria-labelledby="v-pills-sea-tab">
                            <span class="icon mb-3 d-block flaticon-vision"></span>
                            <h2 class="mb-4">Ophthalmology Departments</h2>
                            <p>The Victoria Eye Unit at The County Hospital provides a comprehensive range of ophthalmic services, covering all aspects of general ophthalmology including cataract surgery.</p>
                            <p>The department is extremely well equipped, with digital photographic and laser imaging equipment which is networked throughout the hospital.  </p>
                            {{--<p><a href="#" class="btn btn-primary">Learn More</a></p>--}}
                        </div>

                        <div class="tab-pane fade py-5" id="v-pills-spa" role="tabpanel" aria-labelledby="v-pills-spa-tab">
                            <span class="icon mb-3 d-block flaticon-ambulance"></span>
                            <h2 class="mb-4">Emergency Departments</h2>
                            <p>An emergency department (ED), also known as an accident & emergency department (A&E), emergency room (ER), emergency ward (EW) or casualty department, is a medical treatment facility specializing in emergency medicine, the acute care of patients who present without prior appointment; either by their own means or by that of an ambulance. The emergency department is usually found in a hospital or other primary care centre.</p>
                            {{--<p><a href="#" class="btn btn-primary">Learn More</a></p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section-2 img" style="background-image: url(template/images/bg_3.jpg);">
        <div class="container">
            <div class="row d-md-flex justify-content-end">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2>Laboratory Services</h2>
                                <p>We are ranked as one of the finest Laboratory in the world.</p>
                            </a>
                            <a href="#" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2>General Treatment</h2>
                                <p>All Treatment are handled by various department and Teams.</p>
                            </a>
                            <a href="#" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2>Emergency Service</h2>
                                <p>With more than 24 Emergency Room, HMS is fully prepared for an Emergency Situation.</p>
                            </a>
                            <a href="#" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2>24/7 Help &amp; Support</h2>
                                <p>24 hours and 7 days a week of full time availability</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(template/images/bg_4.jpg);">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2 class="mb-4">Some fun facts</h2>
                    <span class="subheading"></span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="6">0</strong>
                                    <span>Departments</span>
                                </div>
                            </div>
                        </div>12
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="12">0</strong>
                                    <span>Doctors</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="5">0</strong>
                                    <span>Clinics</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="200">0</strong>
                                    <span>Reviews</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Testimonials</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap text-center">
                                <div class="user-img mb-5" >
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">I recently found myself under your care for a cardiac issue. While there, accompanied by my wife, we found that the entire staff at Jamaica Hospital was exceedingly professional and efficient, from your E.R. receptionists to the cardiac care team. You should be proud of your outstanding staff and service.</p>
                                    <p class="name">Chung Lee</p>
                                    <span class="position">Patient</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center">
                                <div class="user-img mb-5">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">On behalf of my wife, who was a patient in your hospital, I humbly submit my sincere gratitude to the management and staff of Jamaica Hospital, especially to your outstanding nurses and PCAs. They have been outstandingly helpful and provided a high quality of service, care and comfort to my wife. Thank you..</p>
                                    <p class="name">Ganesh</p>
                                    <span class="position">Patient</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center">
                                <div class="user-img mb-5">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                    <p class="name">Dennis Green</p>
                                    <span class="position">Patient</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center">
                                <div class="user-img mb-5">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">I am writing to express my gratitude from my family for the care given to my mother. In the SICU, there was care, compassion, and respect. A special thank you to your social workers as well; they provided professional guidance, comfort, and strength to make our own decisions. Finally, I cannot praise the Palliative Care and Hospice team enough. They were patient and helpful. All our hope that you continue along this path.</p>
                                    <p class="name">The A Family</p>
                                    <span class="position">Family</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection