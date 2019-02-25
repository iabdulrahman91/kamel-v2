@extends('layouts.user')
@section('content')

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="/rentRequests">

            {{ csrf_field() }}

            <input type="hidden" name="listing_id" value="{{$listing->id}}">

            {{--Start--}}


            <div class="form-group">
                <label for="start" class="col-md-4 h3">{{$listing->item}}</label>
                @if ($errors->has('listing_id'))
                    <span class="help-block">
                                    <strong>{{ $errors->first('listing_id') }}</strong>
                                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="start" class="col-md-4 h3">{{$listing->location}}</label>
            </div>

            <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                <label for="start" class="col-md-4 control-label">Start Date &nbsp; This item is available
                    from {{$listing->start}}</label>

                <div class="col-md-6">
                    <input id="start" type="date" class="form-control" name="start"
                           value="{{ old('start') }}" required>

                    @if ($errors->has('start'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>


            {{--End--}}
            <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                <label for="end" class="col-md-4 control-label">End Date &nbsp; This item is available
                    untill {{$listing->end}}</label>

                <div class="col-md-6">
                    <input id="end" type="date" class="form-control" name="end"
                           value="{{ old('end')  }}" onchange="cal()" required>

                    @if ($errors->has('end'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6">
                    <input id="numdays2" type="text" class="form-control" name="numdays" disabled="true">

                </div>
            </div>


            {{--cost--}}
            <div class="form-group">


            </div>

            <div class="form-group">
                <div class="col-md-6">
                    <input class="btn btn-success btn-lg btn-block" type="submit" type="submit" value="Request this item">

                    <input class="btn btn-info btn-sm btn-block" type="reset" value="Reset">

                    {{-- cancel btn--}}
                    <a class="btn btn-danger btn-block" href="/listings" role="button">Cancel</a>

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
                document.getElementById("numdays2").value = (days>0)? "Estimated Cost = SAR " +(days*parseFloat({{$listing->price}})) + " for " + days + " day/s " : "End date must be after start date.";
            }
        }

    </script>

@endsection
