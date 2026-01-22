<div class="ad-v2-hom-info">
    <div class="ad-v2-hom-info-inn">
        <ul>
            <li>
                <div class="ad-hom-box ad-hom-box-1">
                    <span class="ad-hom-col-com ad-hom-col-1"><i class="fa fa-bar-chart"></i></span>
                    <div class="ad-hom-view-com">
                    <p><i class="fa  fa-arrow-up up"></i> Today Views</p>
                    <h3>22,520</h3>
                    </div>
                </div>
            </li>
            <li>
                <div class="ad-hom-box ad-hom-box-2">
                    <span class="ad-hom-col-com ad-hom-col-2"><i class="fa fa-usd"></i></span>
                    <div class="ad-hom-view-com">
                    <p><i class="fa  fa-arrow-up up"></i> Earnings</p>
                    <h3>22,520</h3>
                    </div>
                </div>
            </li>
            <li>
                <div class="ad-hom-box ad-hom-box-3">
                    <span class="ad-hom-col-com ad-hom-col-3"><i class="fa fa-address-card-o"></i></span>
                    <div class="ad-hom-view-com">
                    <p><i class="fa  fa-arrow-up up"></i> Users</p>
                    <?php $Users = App\Models\User::all() ?>
                    <h3><?php echo count($Users) ?></h3>
                    </div>
                </div>
            </li>
            <li>
                <div class="ad-hom-box ad-hom-box-4">
                    <span class="ad-hom-col-com ad-hom-col-4"><i class="fa fa-envelope-open-o"></i></span>
                    <div class="ad-hom-view-com">
                    <p><i class="fa  fa-arrow-up up"></i> Enquiry</p>
                    <?php $Message = App\Models\Message::all() ?>
                    <h3><?php echo count($Message) ?></h3>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>