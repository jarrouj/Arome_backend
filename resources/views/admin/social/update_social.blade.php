<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body class="g-sidenav-show   bg-gray-100">

    @include('admin.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('admin.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">

                        <div class="card-header pb-0 ">
                            <a href="{{ url('/admin/show_social') }}" class="btn btn-dark">
                                <i class="bi bi-arrow-left"></i>
                                back
                            </a>
                            <h6>Update All Social Media</h6>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center text-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Icon
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Platform
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Link
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                View status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form action="{{ url('/admin/update_social_confirm', $social->id) }}"
                                            method="POST">
                                            @csrf

                                            <tr>
                                                <td>
                                                    <i class="bi bi-telephone fs-4"></i>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Phone
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="phone"
                                                            value="{{ $social->phone }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="phone_sh" >
                                                            <option value="1"
                                                                {{ $social->phone_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="bi bi-envelope fs-4"></i>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Email
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="email"
                                                            value="{{ $social->email }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="email_sh" >
                                                            <option value="1"
                                                                {{ $social->email_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-solid fa-map fs-4" ></i>                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Map
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="map"
                                                            value="{{ $social->map }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="map_sh" >
                                                            <option value="1"
                                                                {{ $social->map_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-solid fa-location-dot fs-4" style="color: rgb(194, 6, 6)"></i>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Location
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="location"
                                                            value="{{ $social->location }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="location_sh" >
                                                            <option value="1"
                                                                {{ $social->location_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-brands fa-instagram fs-4"
                                                        style="background: #d6249f;
                                                            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
                                                            -webkit-background-clip: text;
                                                            -webkit-text-fill-color: transparent;">
                                                    </i>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Instagram
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="instagram"
                                                            value="{{ $social->instagram }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="instagram_sh">
                                                            <option value="0"
                                                                {{ $social->instagram_sh == '0' ? 'selected' : '' }}>
                                                                Hidden
                                                            </option>
                                                            <option value="1"
                                                                {{ $social->instagram_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-brands fa-facebook-f fs-4" style="color: #3b5998"></i>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Facebook
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="facebook"
                                                            value="{{ $social->facebook }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="facebook_sh">
                                                            <option value="0"
                                                                {{ $social->facebook_sh == '0' ? 'selected' : '' }}>
                                                                Hidden
                                                            </option>
                                                            <option value="1"
                                                                {{ $social->facebook_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-brands text-dark fa-tiktok fs-4"></i>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Tiktok
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="tiktok"
                                                            value="{{ $social->tiktok }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="tiktok_sh">
                                                            <option value="0"
                                                                {{ $social->tiktok_sh == '0' ? 'selected' : '' }}>
                                                                Hidden
                                                            </option>
                                                            <option value="1"
                                                                {{ $social->tiktok_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-brands text-danger fa-youtube fs-4"></i>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Youtube
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="youtube"
                                                            value="{{ $social->youtube }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="youtube_sh">
                                                            <option value="0"
                                                                {{ $social->youtube_sh == '0' ? 'selected' : '' }}>
                                                                Hidden
                                                            </option>
                                                            <option value="1"
                                                                {{ $social->youtube_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-brands fa-twitter fs-4" style="color: #00acee "></i>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Twitter
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="twitter"
                                                            value="{{ $social->twitter }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="twitter_sh">
                                                            <option value="0"
                                                                {{ $social->twitter_sh == '0' ? 'selected' : '' }}>
                                                                Hidden
                                                            </option>
                                                            <option value="1"
                                                                {{ $social->twitter_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-brands fa-dribbble fs-4" style="color: #d6249f"></i>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Dribble
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="dribble"
                                                            value="{{ $social->dribble }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="dribble_sh">
                                                            <option value="0"
                                                                {{ $social->dribble_sh == '0' ? 'selected' : '' }}>
                                                                Hidden
                                                            </option>
                                                            <option value="1"
                                                                {{ $social->dribble_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-brands fa-medium fs-4" style="color: black"></i>                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Medium
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="medium"
                                                            value="{{ $social->medium }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="medium_sh">
                                                            <option value="0"
                                                                {{ $social->medium_sh == '0' ? 'selected' : '' }}>
                                                                Hidden
                                                            </option>
                                                            <option value="1"
                                                                {{ $social->medium_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-brands fa-behance fs-4"></i>                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Behance
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="behance"
                                                            value="{{ $social->behance }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="behance_sh">
                                                            <option value="0"
                                                                {{ $social->behance_sh == '0' ? 'selected' : '' }}>
                                                                Hidden
                                                            </option>
                                                            <option value="1"
                                                                {{ $social->behance_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-brands fa-discord fs-4" ></i>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Discord
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="discord"
                                                            value="{{ $social->discord }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="discord_sh">
                                                            <option value="0"
                                                                {{ $social->discord_sh == '0' ? 'selected' : '' }}>
                                                                Hidden
                                                            </option>
                                                            <option value="1"
                                                                {{ $social->discord_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-brands fa-square-threads fs-4" style="color: black"></i>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Threads
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="threads"
                                                            value="{{ $social->threds }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="threads_sh">
                                                            <option value="0"
                                                                {{ $social->threads_sh == '0' ? 'selected' : '' }}>
                                                                Hidden
                                                            </option>
                                                            <option value="1"
                                                                {{ $social->threads_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-brands fa-snapchat fs-4" style="color: yellow"></i>
                                                    <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Snapchat
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="snapchat"
                                                            value="{{ $social->snapchat }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="snapchat_sh">
                                                            <option value="0"
                                                                {{ $social->snapchat_sh == '0' ? 'selected' : '' }}>
                                                                Hidden
                                                            </option>
                                                            <option value="1"
                                                                {{ $social->snapchat_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-brands fa-linkedin-in fs-4"
                                                        style="color: #0072b1"></i>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Linkedin
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="linkedin"
                                                            value="{{ $social->linkedin }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="linkedin_sh">
                                                            <option value="0"
                                                                {{ $social->linkedin_sh == '0' ? 'selected' : '' }}>
                                                                Hidden
                                                            </option>
                                                            <option value="1"
                                                                {{ $social->linkedin_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <i class="fa-brands fa-whatsapp text-success fs-4"></i>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        Whatsapp
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <input type="text" name="whatsapp"
                                                            value="{{ $social->whatsapp }}" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center m-auto">
                                                        <select class="w-50 form-select" name="whatsapp_sh">
                                                            <option value="0"
                                                                {{ $social->whatsapp_sh == '0' ? 'selected' : '' }}>
                                                                Hidden
                                                            </option>
                                                            <option value="1"
                                                                {{ $social->whatsapp_sh == '1' ? 'selected' : '' }}>
                                                                Visible
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn mt-3 btn-dark">
                                                    <i class="bi bi-cloud-upload me-2 fs-5"></i>Update</button>
                                            </div>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.footer')
        </div>
    </main>

    @include('admin.script')

</body>

</html>
