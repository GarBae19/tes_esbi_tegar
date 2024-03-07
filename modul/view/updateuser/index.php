<body class="bg-gradient-success">
    <div class="container pt-5">

        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-0">
                        <div class="row">
                            <img src="<?= BASEURLASET; ?>img/herbal.png" class="col-lg-6 d-none d-lg-block p-5"></img>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><?= $data['title'] ?></h1>
                                    </div>
                                    <form class="user" action="<?= BASEURL; ?>UpdateUser/update" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama..." value="<?= $data['data']['nama'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="<?= $data['data']['email'] ?>" required>
                                        </div>
                                        <input type='hidden' name='id' value="<?= $data['data']['id'] ?>"></input>
                                        <button type="submit" class="btn btn-success btn-user btn-block mb-2">
                                            Submit
                                        </button>
                                        <a href="<?= BASEURL; ?>" class="btn btn-warning btn-user btn-block mb-5">
                                            Kembali
                                        </a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>