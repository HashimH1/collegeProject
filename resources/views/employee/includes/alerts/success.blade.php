@if(Session::has('success'))
    <div style="word-wrap: break-word;" class="row mr-2 ml-2">
            <button style="word-wrap: break-word;" type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                    id="type-error">{{Session::get('success')}}
            </button>
    </div>
@endif
