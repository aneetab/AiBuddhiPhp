<div class="modal" id="teammodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Create your project</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-header">
                <small>Type in your team requirements. A project team will be created for you, based on the requirements. Please fill all the required fields carefully</small>
            </div>
            <div class="modal-body">
                <form id="team_form" action="" method="POST">
                    <div class="form-group">
                    <label for="title">Team name</label>
                    <input class="form-control" type="text" name="team_name" id="team_name" placeholder="Enter project team name"></input>
                    </div>
                    <div class="form-group">
                    <label for="title">Select industries under which you need expert consultation(You can select more than one option)</label>
                    <select name="industries[]" id="industries" multiple class="form-control">
                    <option value="">Select industry</option>
                    <?php

                    if(mysqli_num_rows($industry_res)>0)
                    {
                        while($industry_row=mysqli_fetch_assoc($industry_res))
                        {
                            echo "<option value='".$industry_row['name']."'>".$industry_row['name']."</option>";
                        }
                    }
                    ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="title">Select enterprises under which you need expert consultation(You can select more than one option)</label>
                    <select name="enterprises[]" id="enterprises" multiple class="form-control">
                    <option value="">Select enterprise</option>
                    <?php

                    if(mysqli_num_rows($enterprise_res)>0)
                    {
                        while($enterprise_row=mysqli_fetch_assoc($enterprise_res))
                        {
                            echo "<option value='".$enterprise_row['name']."'>".$enterprise_row['name']."</option>";
                        }
                    }
                    ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="title">Select any expert preferences you might have(Optional)</label>
                    <input autocomplete="off" type="text" name="search" id="search" class="form-control form-control-lg rounded-0 border-info" placeholder="Enter Name" style="width:80%;">
                    <div class="col-md-5">
                    <div class="list-group" id="show-list" style="position:relative;margin-top:-18px;width:346px;">
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="desc">Describe your project requirements(Specify briefly what kind of help ypu require)</label>
                    <textarea class="form-control" rows="5" name="team_desc" id="team_desc" placeholder="Briefly describe your project requirements"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-dark" onclick="createTeam()" name='save' id="submitForm" data-dismiss="modal">CREATE</button>
            </div>
</div>
</div>
</div>
