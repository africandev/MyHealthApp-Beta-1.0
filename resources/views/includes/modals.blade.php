@if(isset($modal_name))
    @if($modal_name == 'recipesorter')
    <div class="modal fade" id="RecipesModal" tabindex="-1" role="dialog" aria-labelledby="RecipesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row m-t-25">
                        <div class="col-sm-6 col-lg-4">     
                            <h4>Selon votre état de santé</h4>
                            <b>Votre Biomass : </b>
                            @if($biomass == '')
                            Ajoutez un BioReport<br>
                            @else
                            $biomass
                            @endif
                            <b>Vos maladies : </b>{{ Auth::user()->diseases }}</b>
                            <br>
                            <button type="button" class="btn btn-primary">Confirm</button>
                        </div>
                        <div class="col-sm-6 col-lg-4"><center>   
                            <h4>Par maladie :</h4>
                            <button type="button" class="btn btn-danger btn-lg">
                                <i class="far fa-grin-beam-sweat"></i>&nbsp;Diabète 1</button><br>
                            <button type="button" class="btn btn-warning btn-sm">
                                <i class="fa fa-rss"></i>&nbsp;Diabète 1</button><br>
                            <button type="button" class="btn btn-success btn-sm">
                                <i class="fas fa-heart"></i>&nbsp;Tension <br>Artérielle</button><br>
                            <button type="button" class="btn btn-outline-secondary btn-sm">
                                <i class="fa fa-rss"></i>&nbsp;Danger</button>
                            <button type="button" class="btn btn-outline-danger btn-sm">
                                <i class="fa fa-rss"></i>&nbsp;Danger</button>
                            <button type="button" class="btn btn-outline-danger btn-sm">
                                <i class="fa fa-rss"></i>&nbsp;Danger</button>      
                        </center>
                        </div>
                        <div class="col-sm-6 col-lg-4">   
                            <h4>Par type :</h4>
                            <button type="button" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                    <!--<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Confirm</button>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    @endif
@endif

