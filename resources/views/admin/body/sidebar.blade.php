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
                            <a href="index.html" class="logo logo-dark">
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
                                <a href="#sidebarError" data-bs-toggle="collapse">
                                    <i data-feather="alert-octagon"></i>
                                    <span> Error Pages </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarError">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="error-404.html" class="tp-link">Error 404</a>
                                        </li>
                                        <li>
                                            <a href="error-500.html" class="tp-link">Error 500</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="menu-title mt-2">General</li>

                            <li>
                                <a href="#sidebarBaseui" data-bs-toggle="collapse">
                                    <i data-feather="package"></i>
                                    <span> Components </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarBaseui">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="ui-accordions.html" class="tp-link">Accordions</a>
                                        </li>
                                        <li>
                                            <a href="ui-alerts.html" class="tp-link">Alerts</a>
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
