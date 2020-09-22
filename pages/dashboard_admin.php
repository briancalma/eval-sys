<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="card">
            <div class="header"><h2>News Feed</h2></div>
            <div class="body">
                <form action="../controller/news_feed.php?process=insert" method="POST">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="news_feed" cols="30" rows="3" class="form-control" id="txtPost" placeholder="Say something here . . ." required></textarea>
                        </div>
                        <br>
 
                        <input type="submit" name="btn_post" value="POST" class="btn btn-info btn-lg">
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>    


<div id="news_feed_section">
    <!-- News Feeds Here :) -->

    <?php 

        $sql = "SELECT * FROM `tbl_news_feed` ORDER BY `id` desc";
        $query = $conn->query($sql);

        while ($row = $query->fetch_array()) {
    ?>    
        <div class="row clearfix" id="post<?php echo $row[0] ?>">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <div class="card">
                    <div class="header bg-green">
                        <div class="row">
                            <div class="col-xs-10">
                                <img src="../images/Admin.png" class="img-circle" style="width: 50px;height: 50px;">
                                <label><?php echo ucfirst($row[2]); ?></label>
                            </div>
                            <div class="col-xs-1">
                                <center>
                                <a type="button" onclick="openEditNewsFeedModal('<?php echo $row[0] ?>','<?php echo $row[1] ?>')" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">edit</i>
                                </a>
                                </center>
                            </div>

                             <div class="col-xs-1">
                                <center>
                                    <a type="button" onclick="deletePost('<?php echo $row[0] ?>')" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                        <i class="material-icons">delete</i>
                                    </a>
                                </center>
                            </div>
                        </div>
                        <!-- <div class="col-xs-1"></div> -->
                    </div>
                    <div class="body" style="min-height: 150px;">
                        <p><?php echo $row[1]; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
        </div> 

    <?php } ?>

      
</div>



<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  
        <div class="card">
            <div class="header"><h2>DASHBOARD/HOME</h2></div>
                <div class="body">
                    <div id="carousel-example-generic_2" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic_2" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic_2" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic_2" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="../images/bg1.jpg" /> 
                                <div class="carousel-caption">
                                    <h1>MISSION</h1>
                                    <p>The mission of Bicol College is to improve necessary support to excel in reasearch,</p>
                                    <p>instruction and community outreach in order to produce competetive graduates</p>
                                    <p>with strong social commitment.</p>                                                                        
                                </div>
                            </div>
                            <div class="item">
                                <img src="../images/bg2.png"/>
                                <div class="carousel-caption">
                                    <h1>VISION</h1>
                                    <p>Bicol College envisions to be a university offering affordable education geared towards</p>
                                    <p>academic excellence leadership and social responsibility for the empowerment of the </p>
                                    <p>individual in changing the world.</p>                                                              
                                </div>
                            </div>
                                                        
                            <div class="item">
                                <img src="../images/bg3.png" />
                                <div class="carousel-caption">
                                    <h1>GOALS</h1>
                                    <p>1. Pursue a research culture in the curricular and instructional programs.</p>
                                    <p>2. Adhere to a set of core values among the students and school community.</p>
                                    <p>3. Aim to be a leader in various professions by becoming centers of development and excellence.</p>
                                    <p>4. Strengthen community involvement and extension services.</p>
                                </div>
                            </div>
                            
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic_2" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic_2" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>      
                </div>
        </div>
    </div>
</div>

<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="card">
            <div class="header"><h2>GALERY</h2></div>
            <div class="body">
                <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/1.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-1.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/2.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-2.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/3.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-3.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/4.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-4.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/5.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-5.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/6.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-6.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/7.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-7.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/8.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-8.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/9.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-9.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/10.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-10.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/11.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-11.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/12.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-12.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/13.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-13.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/14.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-14.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/15.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-15.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/16.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-16.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/17.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-17.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/18.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-18.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/19.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-19.jpg">
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="../template/images/image-gallery/20.jpg" data-sub-html="Demo Description">
                            <img class="img-responsive thumbnail" src="../template/images/image-gallery/thumb/thumb-20.jpg">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editNewsFeedModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="../controller/news_feed.php?process=update" method="POST">           
                <div class="modal-header"><h3>Edit News Feed Post</h3></div>
                <div class="modal-body">
                        <input type="hidden" name="post_id" id="post_id">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea name="news_feed" cols="30" rows="3" class="form-control" id="txtPostUpd" placeholder="Say something here . . ." required></textarea>
                            </div>
                            <br>

                            <input type="submit" name="btn_post" value="UPDATE" class="btn btn-success btn-lg">
                        </div>  
                </div>
                <div class="modal-footer"></div>
            </form>
        </div>
    </div>
</div>


<script>
    
    function deletePost(id) 
    {
        var dest = "../controller/news_feed.php?process=delete&id=" + id;

        $.ajax({
            url : dest,
            success:function(data)
            {
                if(data == "ok")
                    $("#post" + id).hide('100');
                else
                    alert("DELETE PROCESS FAILED!");
            }
        });  
    }

    function openEditNewsFeedModal(id,content) 
    {
        $("#editNewsFeedModal").modal();

        $("#txtPostUpd").val(content);

        $("#post_id").val(id);
    }

</script>