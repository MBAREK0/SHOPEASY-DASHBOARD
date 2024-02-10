<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>reset password</title>
</head>
<body>
    <div class="container h-100">
    		<div class="row h-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Reset password</h1>
							<p class="lead">
								You can reset your password using this form
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="/newpasswordPost" method="post">
                                        @csrf
                                        <input type="text" name="token" value="{{$token}}" hidden>
										<div class="form-group">
											<label>Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your new password">
										</div>
                                        <div class="form-group">
											<label>Confirm Password</label>
											<input class="form-control form-control-lg" type="password" name="confirmpassword" placeholder="Confirm password">
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Reset password</button>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Reset password</button> -->
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

       
</body>
</html>