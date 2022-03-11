<?php

require_once './src/View/includes/header.inc.php';

?>

<form action="" method="post">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Register</h3>
                        
                        <div class="form-outline mb-4">
                            <input type="text" id="nickname" name="nickname" class="form-control form-control-lg" required/>
                            <label class="form-label" for="nickname">Nickname</label>
                        </div>

                        <div class="form-outline mb-4">
                            <select name="gender" id="gender" class="form-control form-control-lg" required>
                                <option value="Man">Man</option>
                                <option value="Woman">Woman</option>
                                <option value="None">None</option>
                            </select>
                            <label class="form-label" for="gender">Gender</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg" required />
                            <label class="form-label" for="typeEmailX-2">Email</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" required/>
                            <label class="form-label" for="typePasswordX-2">Password</label>
                        </div>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-start mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" required/>
                            <label class="form-check-label" for="form1Example3"> I agree on <a href="">Terms</a> and Conditions</label>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<?php

require_once './src/View/includes/footer.inc.php';

?>