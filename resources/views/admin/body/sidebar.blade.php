  <div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="24">
                    </span>
                </a>
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="tp-link">
                        <i data-feather="home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="#card" data-bs-toggle="collapse">
                        <i data-feather="layout"></i>
                        <span>Manage Card</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="card">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.cards') }}" class="tp-link">All Cards</a>
                            </li>
                            <li>
                                <a href="{{ route('add.card') }}" class="tp-link">Add Card</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#hero" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Manage Hero </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="hero">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.heroes') }}" class="tp-link">All Heroes</a>
                            </li>
                            <li>
                                <a href="{{ route('add.hero') }}" class="tp-link">Add Hero</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#service" data-bs-toggle="collapse">
                        <i data-feather="briefcase"></i>
                        <span> Manage Service </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="service">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.services') }}" class="tp-link">All Services</a>
                            </li>
                            <li>
                                <a href="{{ route('add.service') }}" class="tp-link">Add Service</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#choose" data-bs-toggle="collapse">
                        <i data-feather="check-square"></i>
                        <span> Manage Choose </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="choose">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.choices') }}" class="tp-link">All Choices</a>
                            </li>
                            <li>
                                <a href="{{ route('add.choice') }}" class="tp-link">Add Choice</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#success" data-bs-toggle="collapse">
                        <i data-feather="check-circle"></i>
                        <span> Manage Success </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="success">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.successes') }}" class="tp-link">All Success Stories</a>
                            </li>
                            <li>
                                <a href="{{ route('add.success') }}" class="tp-link">Add Success Story</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#live" data-bs-toggle="collapse">
                        <i data-feather="activity"></i>
                        <span>Manage Live Acceptance</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="live">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.lives') }}" class="tp-link">All Live Acceptances</a>
                            </li>
                            <li>
                                <a href="{{ route('add.live') }}" class="tp-link">Add Live Acceptance</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#partner" data-bs-toggle="collapse">
                        <i data-feather="book"></i>
                        <span>Manage University Partners</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="partner">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.partners') }}" class="tp-link">All University Partners</a>
                            </li>
                            <li>
                                <a href="{{ route('add.partner') }}" class="tp-link">Add University Partner</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#acceptance" data-bs-toggle="collapse">
                        <i data-feather="check-circle"></i>
                        <span>Manage Acceptance</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="acceptance">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.acceptances') }}" class="tp-link">All Acceptances</a>
                            </li>
                            <li>
                                <a href="{{ route('add.acceptance') }}" class="tp-link">Add Acceptance</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#week" data-bs-toggle="collapse">
                        <i data-feather="calendar"></i>
                        <span>Manage Week's Stats</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="week">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.weeks') }}" class="tp-link">All Weeks</a>
                            </li>
                            <li>
                                <a href="{{ route('add.week') }}" class="tp-link">Add Week</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#consultation" data-bs-toggle="collapse">
                        <i data-feather="phone"></i>
                        <span>Manage Consultation</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="consultation">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.consultations') }}" class="tp-link">All Consultations</a>
                            </li>
                            <li>
                                <a href="{{ route('add.consultation') }}" class="tp-link">Add Consultation</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#footer" data-bs-toggle="collapse">
                        <i data-feather="share-2"></i>
                        <span>Manage Footer</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="footer">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.footers') }}" class="tp-link">All Footers</a>
                            </li>
                            <li>
                                <a href="{{ route('add.footer') }}" class="tp-link">Add Footer</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#social" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span>Manage Social</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="social">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.socials') }}" class="tp-link">All Social</a>
                            </li>
                            <li>
                                <a href="{{ route('add.social') }}" class="tp-link">Add Social</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#about" data-bs-toggle="collapse">
                        <i data-feather="info"></i>
                        <span>Manage About</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="about">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.about') }}" class="tp-link">All About</a>
                            </li>
                            <li>
                                <a href="{{ route('add.about') }}" class="tp-link">Add About</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#about_rating" data-bs-toggle="collapse">
                        <i data-feather="info"></i>
                        <span>Manage About Rating</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="about_rating">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.about_ratings') }}" class="tp-link">All Rating</a>
                            </li>
                            <li>
                                <a href="{{ route('add.about_rating') }}" class="tp-link">Add Rating</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#statement" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span>Manage Statement</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="statement">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.statements') }}" class="tp-link">All Statements</a>
                            </li>
                            <li>
                                <a href="{{ route('add.statement') }}" class="tp-link">Add Statement</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#value" data-bs-toggle="collapse">
                        <i data-feather="heart"></i>
                        <span>Manage Value</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="value">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.values') }}" class="tp-link">All Values</a>
                            </li>
                            <li>
                                <a href="{{ route('add.value') }}" class="tp-link">Add Value</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#team" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span>Manage Team</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="team">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.teams') }}" class="tp-link">All Teams</a>
                            </li>
                            <li>
                                <a href="{{ route('add.team') }}" class="tp-link">Add Team</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#journey" data-bs-toggle="collapse">
                        <i data-feather="map"></i>
                        <span>Manage Journey</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="journey">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.journeys') }}" class="tp-link">All Journeys</a>
                            </li>
                            <li>
                                <a href="{{ route('add.journey') }}" class="tp-link">Add Journey</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#ourpartners" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span>Manage Our Partners</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="ourpartners">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.ourpartners') }}" class="tp-link">All Our Partners</a>
                            </li>
                            <li>
                                <a href="{{ route('add.ourpartner') }}" class="tp-link">Add Our Partner</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#standard" data-bs-toggle="collapse">
                        <i data-feather="award"></i>
                        <span>Manage Standard</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="standard">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.standards') }}" class="tp-link">All Standards</a>
                            </li>
                            <li>
                                <a href="{{ route('add.standard') }}" class="tp-link">Add Standard</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#ourservice" data-bs-toggle="collapse">
                        <i data-feather="tool"></i>
                        <span>Manage Our Service</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="ourservice">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.ourservices') }}" class="tp-link">All Our Services</a>
                            </li>
                            <li>
                                <a href="{{ route('add.ourservice') }}" class="tp-link">Add Our Service</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#admissionservice" data-bs-toggle="collapse">
                        <i data-feather="book-open"></i>
                        <span>Manage Admission Service</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="admissionservice">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.admissionservices') }}" class="tp-link">All Admission Services</a>
                            </li>
                            <li>
                                <a href="{{ route('add.admissionservice') }}" class="tp-link">Add Admission Service</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#admissionprocess" data-bs-toggle="collapse">
                        <i data-feather="book-open"></i>
                        <span>Manage Admission Process</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="admissionprocess">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.admissionprocesses') }}" class="tp-link">All Admission Processes</a>
                            </li>
                            <li>
                                <a href="{{ route('add.admissionprocess') }}" class="tp-link">Add Admission Process</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#admissionreq" data-bs-toggle="collapse">
                        <i data-feather="help-circle"></i>
                        <span>Manage Admission Requirement</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="admissionreq">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.admissionrequirements') }}" class="tp-link">All Admission Requirements</a>
                            </li>
                            <li>
                                <a href="{{ route('add.admissionrequirement') }}" class="tp-link">Add Admission Requirement</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#admissiontimeline" data-bs-toggle="collapse">
                        <i data-feather="help-circle"></i>
                        <span>Manage Admission Timeline</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="admissiontimeline">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.admissiontimelines') }}" class="tp-link">All Admission Timelines</a>
                            </li>
                            <li>
                                <a href="{{ route('add.admissiontimeline') }}" class="tp-link">Add Admission Timeline</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#faq" data-bs-toggle="collapse">
                        <i data-feather="help-circle"></i>
                        <span>Manage Admission FAQ</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="faq">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.faqs') }}" class="tp-link">All FAQs</a>
                            </li>
                            <li>
                                <a href="{{ route('add.faq') }}" class="tp-link">Add FAQ</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#financialadvice" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span>Manage Financial Advice</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="financialadvice">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.financialadvice') }}" class="tp-link">All Financial Advice</a>
                            </li>
                            <li>
                                <a href="{{ route('add.financialadvice') }}" class="tp-link">Add Financial Advice</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#financialprocess" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span>Manage Financial Process</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="financialprocess">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.financialprocesses') }}" class="tp-link">All Financial Processes</a>
                            </li>
                            <li>
                                <a href="{{ route('add.financialprocess') }}" class="tp-link">Add Financial Process</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#financialrequirement" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span>Manage Financial Requirement</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="financialrequirement">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.financialrequirements') }}" class="tp-link">All Financial Requirements</a>
                            </li>
                            <li>
                                <a href="{{ route('add.financialrequirement') }}" class="tp-link">Add Financial Requirement</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#financialtimeline" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span>Manage Financial Timeline</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="financialtimeline">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.financialtimelines') }}" class="tp-link">All Financial Timelines</a>
                            </li>
                            <li>
                                <a href="{{ route('add.financialtimeline') }}" class="tp-link">Add Financial Timeline</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#financialfaq" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span>Manage Financial Faq</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="financialfaq">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.financialfaqs') }}" class="tp-link">All Financial Faqs</a>
                            </li>
                            <li>
                                <a href="{{ route('add.financialfaq') }}" class="tp-link">Add Financial Faq</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#studentvisa" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span>Manage Student Visa</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="studentvisa">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.studentvisas') }}" class="tp-link">All Student Visas</a>
                            </li>
                            <li>
                                <a href="{{ route('add.studentvisa') }}" class="tp-link">Add Student Visa</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#studentprocess" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span>Manage Student Process</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="studentprocess">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.studentprocesses') }}" class="tp-link">All Student Processes</a>
                            </li>
                            <li>
                                <a href="{{ route('add.studentprocess') }}" class="tp-link">Add Student Process</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#studentrequirement" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span>Manage Student Requirement</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="studentrequirement">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.studentrequirements') }}" class="tp-link">All Student Requirements</a>
                            </li>
                            <li>
                                <a href="{{ route('add.studentrequirement') }}" class="tp-link">Add Student Requirement</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#studenttimeline" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span>Manage Student Timeline</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="studenttimeline">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.studenttimelines') }}" class="tp-link">All Student Timelines</a>
                            </li>
                            <li>
                                <a href="{{ route('add.studenttimeline') }}" class="tp-link">Add Student Timeline</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#studentfaq" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span>Manage Student Faq</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="studentfaq">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.studentfaqs') }}" class="tp-link">All Student Faqs</a>
                            </li>
                            <li>
                                <a href="{{ route('add.studentfaq') }}" class="tp-link">Add Student Faq</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#platformstat" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span>Manage Platform Stat</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="platformstat">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.platformstats') }}" class="tp-link">All Platform Stats</a>
                            </li>
                            <li>
                                <a href="{{ route('add.platformstat') }}" class="tp-link">Add Platform Stat</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#school" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span>Manage School</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="school">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.schools') }}" class="tp-link">All Schools</a>
                            </li>
                            <li>
                                <a href="{{ route('add.school') }}" class="tp-link">Add School</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#floating" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span>Manage Floating Button</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="floating">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.floatingbuttons') }}" class="tp-link">All Floating Buttons</a>
                            </li>
                            <li>
                                <a href="{{ route('add.floatingbutton') }}" class="tp-link">Add Floating Button</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#scholarshiptop" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span>Manage Scholarship Top</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="scholarshiptop">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.scholarshiptops') }}" class="tp-link">All Scholarship Tops</a>
                            </li>
                            <li>
                                <a href="{{ route('add.scholarshiptop') }}" class="tp-link">Add Scholarship Top</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#cargo" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span>Manage Cargo</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="cargo">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.cargoes') }}" class="tp-link">All Cargoes</a>
                            </li>
                            <li>
                                <a href="{{ route('add.cargo') }}" class="tp-link">Add Cargo</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#cargo-faq" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span>Manage Cargo FAQ</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="cargo-faq">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.cargo_faqs') }}" class="tp-link">All Cargo FAQs</a>
                            </li>
                            <li>
                                <a href="{{ route('add.cargo_faq') }}" class="tp-link">Add Cargo FAQ</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#contactone" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span>Manage ContactOne</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="contactone">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.contactone') }}" class="tp-link">All Contacts</a>
                            </li>
                            <li>
                                <a href="{{ route('add.contactone') }}" class="tp-link">Add Contact</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#contacttwo" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span>Manage ContactTwo</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="contacttwo">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.contacttwo') }}" class="tp-link">All Contacts</a>
                            </li>
                            <li>
                                <a href="{{ route('add.contacttwo') }}" class="tp-link">Add Contact</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#counselor" data-bs-toggle="collapse">
                        <i data-feather="user"></i>
                        <span>Manage Counselor</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="counselor">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.counselors') }}" class="tp-link">All Counselors</a>
                            </li>
                            <li>
                                <a href="{{ route('add.counselor') }}" class="tp-link">Add Counselor</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">General</li>

                <li>
                    <a href="#message" data-bs-toggle="collapse">
                        <i data-feather="mail"></i>
                        <span>Message</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="message">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('message') }}" class="tp-link">Message</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#booking" data-bs-toggle="collapse">
                        <i data-feather="mail"></i>
                        <span>Booking</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="booking">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('booking') }}" class="tp-link">Booking</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarMaps" data-bs-toggle="collapse">
                        <i data-feather="map"></i>
                        <span> Maps </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMaps">
                        <ul class="nav-second-level">
                            <li>
                                <a href="maps-google.html" class="tp-link">Google Maps</a>
                            </li>
                            <li>
                                <a href="maps-vector.html" class="tp-link">Vector Maps</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
