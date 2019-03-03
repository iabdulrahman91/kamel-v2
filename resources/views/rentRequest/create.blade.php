@extends('layouts.card')
@section('cardContent')


    <div class="h3 text-center card-header">
        {{$listing->item}}
    </div>
    <div class="card-body">
        <div class="form-group">
            @if ($errors->has('rentRequest_id'))
                <div class="row justify-content-md-center">
                    <div class="col-md-5 badge-danger">

                        <strong>{{ $errors->first('rentRequest_id') }}</strong>

                    </div>
                </div>
            @endif
        </div>
        <form class="user justify-content-center text-center" method="POST" action="/rentRequests">
            {{ csrf_field() }}
            <input type="hidden" name="listing_id" value="{{$listing->id}}">
            <div class="form-group">
                <div class="col-md-auto">
                    <label for="start" class="h3">{{$listing->location}}</label>
                </div>

            </div>

            <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <label for="start" class="col-form-label">
                            Start Date This item is available from {{$listing->start}}
                        </label>
                        <input id="start" type="date" class="form-control form-control-user text-center" name="start"
                               value="{{ old('start') }}" required>
                        @if ($errors->has('start'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <label for="start" class="col-form-label">
                            End Date This item is available until {{$listing->end}}
                        </label>
                        <input id="end" type="date" class="form-control form-control-user text-center" name="end"
                               value="{{ old('end') }}" onchange="cal()" required>
                        @if ($errors->has('end'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                <div class="row justify-content-md-center">
                    <div class="col-md-5">
                        <input id="numdays2" type="text" class="form-control form-control-user text-center"
                               name="numdays"
                               disabled="true">
                    </div>
                </div>
            </div>
            <div class="form-group">
                @if ($errors->has('listing_id'))
                    <div class="row justify-content-md-center">
                        <div class="col-md-5 badge-danger">

                                    <strong>{{ $errors->first('listing_id') }}</strong>

                        </div>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <input class="btn btn-primary btn-user btn-block" type="submit" type="submit"
                               value="Request this item">
                        <a class="btn btn-outline-danger btn-user btn-block"
                           href="/listings" role="button">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{--calculte cost--}}
    <script type="text/javascript">
        function GetDays() {

            var end = new Date(document.getElementById("end").value);
            var start = new Date(document.getElementById("start").value);
            return parseFloat(((end - start) / (24 * 3600 * 1000)));
        }

        function cal() {
            if (document.getElementById("end")) {
                var days = GetDays();
                document.getElementById("numdays2").value = (days > 0) ? "Estimated Cost = SAR " + (days * parseFloat({{$listing->price}})) + " for " + days + " day/s " : "End date must be after start date.";
            }
        }

    </script>


@endsection
