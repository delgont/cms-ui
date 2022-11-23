<form action="{{ route($action) }}" method="POST" class="row">
    @csrf

    <div class="col-lg-6">
        <input type="text" name="name" class="form-control" placeholder="Name" />
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>

    <div class="col-lg-6">
        <input type="text" name="email" class="form-control" placeholder="Email Address" />
        <small class="text-danger">{{ $errors->first('email') }}</small>
    </div>

    <div class="col-lg-12">
        <input type="text" name="subject" class="form-control" placeholder="Subject" />
        <small class="text-danger">{{ $errors->first('subject') }}</small>
    </div>

    <div class="col-lg-12">
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Message" class="form-control"></textarea>
        <small class="text-danger">{{ $errors->first('message') }}</small>
    </div>

    <div class="col-lg-12">
        <input type="submit" value="send">
    </div>

</form>