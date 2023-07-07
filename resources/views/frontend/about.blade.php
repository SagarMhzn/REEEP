@extends('layouts.app')

@section('content')
    <section id="breadcrumbs" class="breadcrumbs py-4">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2>About Us</h2>

                </div>
            </div>
        </div>
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>About us</li>
            </ol>
        </div>
    </section>

    <section id="about" class="about">
        <div class="about-hero">
            <div class="container" data-aos="fade-up">
                <div class="about-hero" >
                    <h2 align="center">About NEEP</h2>
                    </a>
                    <h4>Nepal Energy Efficiency Programme</h4>
                    <p>The new consitution of Nepal underlines the role of reliable and affordable energy and its
                        sustainable use for the fulfillment of basic needs and the economic growth of the country. However,
                        despite continuous endeavors Nepal’s energy supply and demand balance, particularly electricity
                        still remains in deficit. According to international energy statistics and by regional comparison
                        Nepal shows a high energy intensity, indicating a generally inefficient use of energy in the
                        country. The Government of Nepal has recognised the problem and as part of its Nationally Determined
                        Contributions (NDCs) committed to adopt a low-carbon development pathway. Nepal intends to develop
                        cross-sectoral approaches for an economy based on low emissions. Hereby, energy efficiency is
                        particularly important for the Government of Nepal. However, so far energy efficiency is not yet
                        recognized as an essential component of energy supply in Nepal.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="work-process" class="work-process">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Program Description</h2>
                <p>The Renewable Energy and Energy Efficiency Programme (REEEP) supports the creation of necessary
                    regulatory,
                    stitutional, and private-sector conditions for the promotion of renewable energy and energy efficiency
                    in Nepal. The
                    rogramme is being implemented by the Ministry of Energy, Water Resources, and Irrigation (MOEWRI),
                    Government of
                    lepal with technical assistance provided by the Deutsche Gesellschaft für Internationale Zusammenarbeit
                    (GIZ) on behalf of
                    he German Federal Ministry for Economic Cooperation and Development (BMZ)..</p>
            </div>

            <div class="row content">
                <div class="col-md-5" data-aos="fade-right">
                    <img src="{{ asset('about/about2.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-4" data-aos="fade-left">
                    <h3>Institutional Framework at National Level</h3>
                    <p class="fst-italic">
                        The output improves the institutional and regulatory framework for RE and EE promotion at national
                        level. A clear and
                        conducive legal framework together with a functioning market mechanism is essential for national and
                        sub-national actors
                        (provinces and municipalities) to execute their responsibilities in ensuring the provision of
                        sustainable energy to their
                        respective constituents. Moreover, there is a need for a strong national institution to further
                        develop this framework and
                        provide the actors in this sector with professional support. Accordingly, support is provided for
                        the creation of key
                        regulatory and institutional structures for RE and EE dissemination. This includes activities such
                        as coordination and support
                        to multi-stakeholder processes for the adoption of the en-ergy efficiency and conservation law, the
                        development of
                        implementing rules, regulations, as well as standards and benchmarks, the National Energy Efficiency
                        Action Plan (NEEAP),
                        and the recognition of energy efficiency profes-sions like Energy Auditor and Energy Manager.
                    </p>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
                    <img src="{{ asset('about/about3.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
                    <h3>Institutional Frameworks at Sub-National Level</h3>
                    <p class="fst-italic">
                        In Nepal's federal system, the provincial and municipal governments have a central role to play in
                        the provision of energy
                        related services, in development planning, and in providing financial support like subsidies. In
                        this re-gard, the provincial
                        local governments are supported on local energy planning, budgeting, and setting up of ener-gy
                        planning units and
                        committees. Further, expert advice is provided to selected municipalities in the implementa-tion and
                        dissemination of "best
                        practices" e.g. in Munici-pal Energy Planning. The support is provided with par-ticular focus on the
                        socio-economic
                        development of women and disadvantaged population. Institutional structures are promoted to
                        sustainably anchor
                        participa-tory RE and EE promotion in the provinces and munici-palities.
                    </p>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-5" data-aos="fade-right">
                    <img src="{{ asset('about/about2.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-4" data-aos="fade-left">
                    <h3>Institutional Framework at National Level</h3>
                    <p class="fst-italic">
                        The output improves the institutional and regulatory framework for RE and EE promotion at national
                        level. A clear and
                        conducive legal framework together with a functioning market mechanism is essential for national and
                        sub-national actors
                        (provinces and municipalities) to execute their responsibilities in ensuring the provision of
                        sustainable energy to their
                        respective constituents. Moreover, there is a need for a strong national institution to further
                        develop this framework and
                        provide the actors in this sector with professional support. Accordingly, support is provided for
                        the creation of key
                        regulatory and institutional structures for RE and EE dissemination. This includes activities such
                        as coordination and support
                        to multi-stakeholder processes for the adoption of the en-ergy efficiency and conservation law, the
                        development of
                        implementing rules, regulations, as well as standards and benchmarks, the National Energy Efficiency
                        Action Plan (NEEAP),
                        and the recognition of energy efficiency profes-sions like Energy Auditor and Energy Manager.
                    </p>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-5 order-1 order-md-2" data-aos="fade-right">
                    <img src="{{ asset('about/about5.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-left">
                    <h3>Institutional Frameworks at Sub-National Level</h3>
                    <p class="fst-italic">
                        In Nepal's federal system, the provincial and municipal governments have a central role to play in
                        the provision of energy
                        related services, in development planning, and in providing financial support like subsidies. In
                        this re-gard, the provincial
                        local governments are supported on local energy planning, budgeting, and setting up of ener-gy
                        planning units and
                        committees. Further, expert advice is provided to selected municipalities in the implementa-tion and
                        dissemination of "best
                        practices" e.g. in Munici-pal Energy Planning. The support is provided with par-ticular focus on the
                        socio-economic
                        development of women and disadvantaged population. Institutional structures are promoted to
                        sustainably anchor
                        participa-tory RE and EE promotion in the provinces and munici-palities.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
