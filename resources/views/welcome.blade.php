@extends('layouts.welcome_layout')

@section('title', 'Welcome Page - D4 TRLP Site')

<link rel="stylesheet" href="{{asset('assets/css/welcome.css')}}">
<link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <!-- Demo styles -->
    <style>
      html,
      body {
        position: relative;
        height: 100%;
      }

      body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
      }

      .swiper-container {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        background-position: center;
        background-size: cover;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
      }
    </style>
@section('content')
    <div class="container">
        {{-- section 1 --}}
        <div class="row" style="margin-top: 125px">
            <div class="col-md-6">
                <img src="{{asset('assets/gambar/bg/section 1-welcome.png')}}" alt="" srcset="">
            </div>
            <div class="col-md-6">
                <h3>Ingin menjadi Ahli dibidang Rekayasa Perangkat Lunak??</h3>
                <p>Pada zaman sekarang ini, penggunaan software(perangkat lunak) semakin di gemari banyak perusahaan
                    besar, oleh karena itu lowongan kerja untuk Ahli Rekayasa Perangkat lunak semakin besar.
                    D4 TRPL IT Del siap untuk menciptakan ahli-ahli dalam Rekayasa Perangkat Lunak.
                    Ahli yang dimaksud adalah, Ahli di bidang basic Programing, Apps developer, Web developer, UI/UX developer, QA Engineer, dan yang lainnya. Ketahui lebih banyak dengan click tombol di bawah</p>
                <a class="btn btn-outline-info" href="#section2">Get Started</a>
            </div>
        </div>
        <div class="section1-2 mx-auto">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('assets/gambar/bg/ban-pt.png.crdownload')}}" alt="" srcset="">
                </div>
                <div class="col-md-4">
                    <h4 class="text-center mt-4">Terakreditasi BAN-PT</h4>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('assets/gambar/bg/ban-pt.png.crdownload')}}" alt="" srcset="">
                </div>
            </div>
        </div>

        {{-- section 2 --}}
        <div class="section2" id="section2">
            <div class="judulSection2 text-center">
                <h2>Rekayasa Perangkat Lunak??</h2>
                <span>Sekilas mengenai Rekayasa Perangkat Lunak IT Del</span>
            </div>
            <nav>
                <div class="nav nav-tabs justify-content-center mt-4 border-0" id="nav-tab" role="tablist">
                  <a class="nav-link active nv-sc2" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">D4 TRPL</a>
                  <a class="nav-link nv-sc2" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Visi & Misi</a>
                  <a class="nav-link nv-sc2" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Struktur Organisasi</a>
                </div>
            </nav>
            <div class="tab-content mt-4" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{asset('assets/gambar/bg/RPL 1.png')}}" alt="" srcset="" width="500px">
                        </div>
                        <div class="col-md-6">
                            <p> Berdasarkan Wikipedia, Teknik Rekayasa Perangkat Lunak adalah  satu bidang profesi yang mendalami cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak dan manajemen kualitas. Perangkat lunak yang dimaksud harus dapat terintegrasikan dalam versi mobile, website, maupun Desktop. Oleh karena itulah, IT Del hadir dalam <b> Prodi D4 Teknik Rekayasa Perangkat Lunak </b> untuk menghadirkan professional pengembang Perangkat lunak.
                            </p>
                               <p> D4 TRPL IT Del sudah berdiri sejak 2012 yang lalu, walau tergolong masih muda, prodi ini dapat dikatakan membanggakan bagi IT Del. Kenapa? Karena berdasarkan history lulusan, lulusan D4 TRPL lebih cepat mendapatkan pekerjaan dibandingkan dengan prodi lain. Bahkah, lulusan D4 TRPL ada yang sudah dipanggil bekerja oleh perusahaan sebelum ia di wisudakan oleh kampus. menarik bukan?? </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        <div class="col-md-6 visi">
                                <div class="jd-visi mx-auto text-center">
                                    <h5> <br> Visi</h5>
                                </div>
                            <p>Menjadi pusat pendidikan dan pengajaran berstandar nasional dan bersinergi dengan dunia industri yang menghasilkan Sarjana Sains Terapan di bidang informatika yang berdaya saing dalam Masyarakat Ekonomi ASEAN (MEA) pada tahun 2020</p>
                        </div>
                        <div class="col-md-6 visi">
                            <div class="jd-visi mx-auto text-center">
                                <h5><br> Tujuan</h5>
                            </div>
                            <p>Menghasilkan sumber daya manusia profesional di bidang informatika yang memiliki jiwa kepemimpinan, kreatif, inovatif, mandiri, mampu bersaing secara global serta memiliki tindakan yang merefleksikan karakter Del, yaitu Mar-Tuhan, Marroha, Marbisuk.
                                Menghasilkan karya-karya ilmiah tepat guna di bidang informatika yang berdampak pada kesejahteraan masyarakat.
                                Menerapkan hasil-hasil penelitian serta menghasilkan berbagai kegiatan pengabdian kepada masyarakat untuk peningkatan pengetahuan dan keterampilan masyarakat, industri informatika dan instansi terkait</p>
                        </div>
                    </div>
                    <div class="row visi mt-4">
                        <div class="jd-visi mx-auto text-center">
                            <h5><br> Misi</h5>
                        </div>
                        <div class="pl-5 pr-5">
                            <p>1. Menyelenggarakan pendidikan dan pengajaran vokasional yang menerapkan prinsip student-centered learning              dan berbasis pada kompetensi yang dibutuhkan dunia kerja. <br>

                                2. Menyelenggarakan program penelitian yang menghasilkan produk teknologi informasi yang memberikan solusi tepat guna dan inovatif <br>

                                3. Menyelenggarakan proses pengabdian kepada masyarakat di lingkungan internal maupun lingkungan eksternal (industri, pemerintah dan masyarakat umum) melalui berbagai program diseminasi teknologi informasi. <br>

                                4. Mendorong pengembangan kelembagaan program studi yang berorientasi pada standar mutu nasional <br>

                                5. Meningkatkan kemampuan untuk berwirausaha dalam rangka menambah jumlah lapangan pekerjaan di bidang teknologi informasi. <br>

                                6. Mendorong keterlibatan program studi dalam kegiatan di level nasional dan internasional</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade text-center" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <img src="{{asset('assets/gambar/bg/diagramOrganisasi.png')}}" alt="" srcset="">
                </div>
            </div>
        </div>
    </div>
    {{-- section 3 --}}
    <div class="section3 mt-5">
        <div class="container">
            <div class="row pt-3">
                <div class="col-md-6">
                    <h2>Profile Lulusan</h2>
                    <span>Sekilas mengenai Rekayasa Perangkat Lunak IT Del</span>
                    <p></p>
                    <p>Tahun ajaran 2015/2016 menjadi spesial bagi program studi D4 Teknik Informatika IT Del karena angkatan I akan diwisuda tahun 2016 ini. Akan tetapi, mahasiswa masih harus mengikuti kegiatan Kerja Praktik (KP) selama 2 bulan di dunia industri. Sebanyak 31 mahasiswa akan melakukan kerja praktik di berbagai perusahaan di Medan, Jakarta, Bandung, Kalimantan, dan Kuala Lumpur, Malaysia. Cerita ini juga membosankan?? Coba baca review 2 alumni dibwah mengenai perkuliahan di IT Del selama masa Pendidikan mereka.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('assets/gambar/bg/section 3.png')}}" alt="" srcset="">
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-md-1"></div>
                <div class="col-md-5 visi2 pl-5 pt-3 pb-2 pr-5">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <span><b>Aditya Pranata Siregar</b><br> </span>
                            <span><b>Software Engineer Traveloka</b> <br></span>
                            <span><b>Angkatan 2014</b> </span>
                        </div>
                        <p>Di IT Del saya banyak belajar hal yang mungkin saya
                            tidak dapatkan di tempat lain yaitu mulai dari kejujuran
                            yang menjadi kunci utama hidup di IT Del, kedisplinan,
                            hidup mandiri sehingga dapat mengatur waktu yang baik
                            dan di sisi lain kehidupan di ITDel diajarkan untuk selalu
                            taat terhadap Tuhan Yang Maha Esa dan di IT Del tidak
                            hanya diajarkan tentang hardskill tapi softskill yang
                            mendukung dan sangat berguna ketika berada di dunia
                            kerja. </p>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 visi2 pl-5 pt-3 pb-2 pr-5">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <span><b>Taufan Silitonga</b><br> </span>
                            <span><b>Software Engineer Traveloka</b> <br></span>
                            <span><b>Angkatan 2014</b> </span>
                        </div>
                        <p>Selama di IT Del, saya belajar banyak hal diantaranya :
                            hidup disiplin, teratur, mengenal dan berinteraksi dengan
                            orang lain, manajemen waktu yang baik, kerjasama yang
                            baik , Ketaqwaan terhadap TYME, dan banyak hal-hal
                            penting lainnya. Dosen-dosen nya baik dan sabar dalam
                            membimbing dan mengajari saya, Staff dan Civitasnya
                            juga baik dan ramah.After all kuliah di IT Del itu bawa
                            impact yang sangat besar dalam hidup saya, ilmunya
                            benar-benar dipakai dalam dunia kerja. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- section 4 --}}
     <!-- Swiper JS -->
     <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
          spaceBetween: 30,
          effect: "fade",
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });
      </script>
@endsection
