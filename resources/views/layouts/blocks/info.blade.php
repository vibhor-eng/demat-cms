@if (\Session::has('info'))
            <div class="alert alert-info mt-1">
                <ul>
                    <li>{!! \Session::get('info') !!}</li>
                </ul>
            </div>
        @endif