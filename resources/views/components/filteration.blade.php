<div class="accordion w-100 mt-2 mb-2" id="accordion1">
    <div class="card shadow">

        <a role="button" href="#collapse1" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1" class="collapsed">
            <div class="card-header" id="heading1">
                {{ __('lang.filteration') }}
            </div>
        </a>

        <div div id="collapse1" class="collapse p-3" aria-labelledby="heading1" data-parent="#accordion1">
        
            <form action="{{ url(Request::url()) }}" method="get">
                <div class="row">
                    {{-- Left Side --}}
                    <div class="col-sm-12 col-md-3 h-100 @if(LaravelLocalization::getCurrentLocale() == 'ar') border-left @else border-right @endif">
                        <div>
                            <label class="label-filter">{{ __('lang.order') }}</label><br>
                            <select class="form-control select2" name="order" style="width: 100%">
                                <option value="" selected>{{ __('lang.default_date') }}</option>
                                @if($modelName != 'Spatie\Permission\Models\Role')
                                    @foreach ($modelName::ORDER as $item)
                                        <option value="{{$item}}" @selected(request()->input('order') == $item)>{{ __("lang.$item") }}</option>
                                    @endforeach
                                @else
                                    <option value="name" @selected(request()->input('order') == 'name')>{{ __("lang.name") }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="row mt-2 p-0">
                            <div class="col-md-6">
                                <label class="label-filter">{{ __('lang.sort') }}</label><br>
                                <select class="form-control" name="sort">
                                    @foreach (config('app.sort') as $item)
                                        <option value="{{$item}}" @selected(request()->input('sort') == $item)>{{ __("lang.$item") }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="label-filter">{{ __('lang.perpage') }}</label><br>
                                <select class="form-control" name="perpage">
                                    <option value="">{{ __('lang.default') }}</option>
                                    @foreach (config('app.perpage') as $item)
                                        <option value="{{$item}}" @selected(request()->input('perpage') == $item)>{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
        
                    {{-- Right Side --}}
                    <div class="col-sm-12 col-md-9">
                        {{-- content --}}
                        {{$slot}}

                        {{-- Button --}}
                        <div class="row mt-3">
                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('lang.filter') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>