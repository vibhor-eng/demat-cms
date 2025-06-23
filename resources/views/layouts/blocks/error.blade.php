<?php //dd($errors); ?>
@if ($errors->any())
            <div class="alert alert-danger alert-dismissible mt-1">
                <ul>
                    @foreach ($errors->all() as $error)
                    <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif