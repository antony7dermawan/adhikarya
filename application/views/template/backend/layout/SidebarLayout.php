<div class="pcoded-navigation-label">Navigation</div>
<ul class="pcoded-item pcoded-left-item">


    




<li class="pcoded-hasmenu"> <!-- batas buka 3 tingkat!-->
<a href="javascript:void(0)" class="waves-effect waves-dark">
<span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
<span class="pcoded-mtext">Drone Access</span>

</a>
<ul class="pcoded-submenu"> <!-- batas buka 3 tingkat!-->






<!-- Diluar Grouping disini -->
<li <?php if($this->uri->segment(2)=="buku_besar"){echo 'class="pcoded-hasmenu"';}?>>
        <a href="<?= base_url("c_t_video_capture/"); ?>" class="waves-effect waves-dark">
        <span class="pcoded-micon">
        <i class="feather icon-credit-card"></i>
        </span>
        <span class="pcoded-mtext">Recording</span>
        </a>
</li>

















    

    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
            <span class="pcoded-mtext">Admin</span>
        </a>
        <ul class="pcoded-submenu">
            <li class="">
                <a href="<?= base_url("c_t_login_user"); ?>" class="submenu waves-effect waves-dark">
                    <span class="pcoded-mtext">User</span>
                </a>
            </li>
            
        </ul>
    </li>


    


</ul> <!-- batas buka 3 tingkat!-->
</li> <!-- batas buka 3 tingkat!-->






    
    





























</ul>