<div id="search-container" class="search-box-wrapper pull-right">
    <div class="opal-dropdow-search dropdown">
        <a data-target=".bs-search-modal-lg" data-toggle="modal" class="search-focus btn dropdown-toggle dropdown-toggle-overlay">
            <i class="fa fa-search"></i>
        </a>
        <div class="modal fade bs-search-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-label="Close" data-dismiss="modal" class="close btn btn-sm btn-primary pull-right" type="button">
                            <span aria-hidden="true">x</span>
                        </button>
                        <h4 id="gridSystemModalLabel" class="modal-title">
                            Search
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="toggle-overlay-container">
                            <div class="search-box">
                                <form method="get" class="input-group search-category" action="http://demo2.themelexus.com/medicare/">
                                    <div class="input-group-addon search-category-container">
                                        <div class="select">
                                            <select name="product_cat" id="product_cat" class="dropdown_product_cat">
                                                <option value="" selected="selected">Select a category</option>
                                                <option class="level-0" value="best-sellers">Best
                                                    sellers&nbsp;&nbsp;(11)</option>
                                                <option class="level-0" value="new-arrivals">New
                                                    arrivals&nbsp;&nbsp;(12)</option>
                                                <option class="level-0" value="pharmacies">Pharmaceuticals&nbsp;&nbsp;(23)</option>
                                                <option class="level-1" value="drug">&nbsp;&nbsp;&nbsp;Drug
                                                    Testing&nbsp;&nbsp;(4)</option>
                                                <option class="level-1" value="medication">&nbsp;&nbsp;&nbsp;Medication
                                                    Aids&nbsp;&nbsp;(22)</option>
                                                <option class="level-1" value="needles">&nbsp;&nbsp;&nbsp;Needles
                                                    &amp;
                                                    Syringes&nbsp;&nbsp;(16)</option>
                                                <option class="level-1" value="supply">&nbsp;&nbsp;&nbsp;Pharmacy
                                                    Supply&nbsp;&nbsp;(5)</option>
                                                <option class="level-0" value="popular">Popular&nbsp;&nbsp;(8)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input name="s" maxlength="60" class="form-control search-category-input" type="text" size="20" placeholder="What do you need..." />

                                    <div class="input-group-btn">
                                        <label class="btn btn-link btn-search">
                                            <span class="title-search hidden">Search</span>
                                            <input type="submit" class="fa searchsubmit" value="&#xf002;" />
                                        </label>
                                        <input type="hidden" name="post_type" value="product" />
                                    </div>
                                </form>
                            </div>
                            <div class="dropdown-toggle-button" data-target=".toggle-overlay-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>