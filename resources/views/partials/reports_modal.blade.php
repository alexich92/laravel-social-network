
<!-- Modal -->
<div class="modal fade" id="reportsModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <a class="btn-close pull-right" href="#" data-dismiss="modal"
                style="text-decoration: none;width: 24px;">✖</a>
                <div class="header">
                    <h1>Report</h1>
                    <p>Choosing the right reason help us process the report as soon as possible.</p>
                </div>
                <div class="spacer" style="padding: 0 32px">
                    <ul class="picker">
                        @foreach($reports as $report)
                            <li class="">
                                <a href="#" class="" data-report-id="{{$report->id}}">
                                    <div class="text"><h3><strong>{{$report->name}}</strong></h3></div>
                                    <div class="badge-report-selector pull-right"></div>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="try hidden">
                        <div class="report-explain">
                            <p style="margin-top: 15px;margin-left:10px" class="question"></p>
                            <p style="margin-left:10px" id="affirmation"></p>
                            <ul>
                                <li class="actions"></li>
                            </ul>
                            <p style="margin-left:10px" class="footer"></p>
                        </div>
                    </div>

                </div>
                <p>
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" id='close'class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="next" class="btn btn-primary" disabled>Next</button>
                <button type="button" id='prev' class="btn btn-default hidden">Prev</button>
                <button type="submit" id="report" class="btn btn-danger hidden" >Report</button>
            </div>
        </div>

    </div>
</div>