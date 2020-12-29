<?php
abstract class Web_Interface{

    public static function Load_OrderType($odertype=0){
        $output='<select name="uorder_type" id="purpose" class="form-control">';
        $or_list=array(
                "Digitize",
                "Vectorize",
                "Quote"
        );
              foreach ($or_list as $type) {
                 $output.="<option value='$type'";
                 if($type==$odertype){
                    $output.="selected";
                 }
                 $output.=">$type</option>";
              }
              $output.="</select>";
        echo ($output);
    }
    public static function Load_Required_format($format=0){
        $output=' <select class="form-control" required="" id="required_format" name="urequired_format">';
        $output.='<option value="">Required Format</option>';
        $f_list=array(

            "cdr",
            "ai",
            "eps",
            "Other"

        );
        foreach ($f_list as $ff) {
            $output.="<option value='$ff'";
            if($ff==$format){
                $output.="selected";
            }
            $output.=">$ff</option>";

        }
        $output.="</select>";
        echo ($output);
    }
    
    public static function Required_format2($rf=0){
        $output='<select class="form-control" required="" name="urequired_format2">';
        $output.='<option value="">Required Format</option>';
        $rr_list=array(
            "100",
            "cnd",
            "dsb",
            "dst",
            "dsz",
            "emb",
            "exp",
            "jef",
            "ksm",
            "pef",
            "pof",
            "pxf",
            "tap",
            "xxx",
            "cdr"

        );
        foreach ($rr_list as $rrr) {
            $output.="<option value='$rrr'";
            if($rrr==$rf){
                $output.="selected";
            }
            $output.=">$rrr</option>";
            
        }
        $output.="</select>";
        echo ($output);
    }
    public static function Load_Measure($me=0){
        $output='<select name="umeasure" class="form-control">';
        $output.='<option value="N/A">Select</option>';
        $m_list=array(
            "Inches",
            "cms",
            "mms",
    );
        
        
        
        foreach ($m_list as $m) {
                $output.="<option value='$m'";
                if($m==$me){
                    $output.="selected";
                }
                $output.=">$m</option>";
                

        }
        $output.="</select>";
        echo ($output);
    }
    public static function Load_Fabric($fabric){
        $output=' <select class="form-control" id="fabric_type" name="ufabric_type">';
        $output.='<option value="N/A">Fabric Type</option>';
        $fabric_list=array(
            "Pique",
            "Single Jersey",
            "Cotton Woven",
            "Denim",
            "Silk",
            "Polyester",
            "Twill",
            "Flannel",
            "Fleece",
            "Towel",
            "Leather",
            "Other",


    );
        
        
        
        foreach ($fabric_list as $fa) {
                $output.="<option value='$fa'";
                if($fa==$fabric){
                    $output.="selected";
                }
                $output.=">$fa</option>";
                

        }
        $output.="</select>";
        echo ($output);
        
       
        
        
    }
    public static function Load_placement($placement=0){
        $output='<select class="form-control" id="placement" name="uplacement">';
        $output.="<option value='N/A'>Select Placement</option>";
        $place_list=array(
        "Cap",
        "Cap Side",
        "Cap Back",
        "Chest",
        "Gloves",
        "Sleeves",
        "Towel",
        "Visor",
        "Jacket Back",
        "Other"
        );

        foreach ($place_list as $pl) {
            $output.="<option value='$pl'";
            if($pl==$placement){
                $output.="selected";
            }
            $output.=">$pl</option>";
        }
        $output.="</select>";
        echo ($output);
    }
    public static function Load_Color($color=0){
        $output='<select class="form-control" id="no_of_colors" name="uno_of_colors">';
        $output.='  <option value="N/A">No. of Colors</option>';
            for ($i=1; $i <10; $i++) { 
                $output.="<option value='$i'";
                if($i==$color){
                    $output.="selected";

                }
                $output.=">$i</option>";
            }
            $output.="</select>";
            echo ($output);
    }
    public static function Load_blending($blending=0){
        $output=' <select class="form-control" id="blending" name="ublending">';
        $output.='<option value="N/A">Do You Require blending ?</option>';
        $b_list=array(

            "Yes",
            "No",
            "Not Sure"
        );
            foreach($b_list as $b){ 
                $output.="<option value='$b'";
                if($b==$blending){
                    $output.="selected";

                }
                $output.=">$b</option>";
            }
            $output.="</select>";
            echo ($output);
    }

    public static function Load_urgent($urgent=0){
        $output=' <select class="form-control" id="urgent_work" name="urgent_work">';
        $output.=' <option value="N/A">Urgent Work</option>';
        $u_list=array(

            "Yes",
            "No",
            
        );
            foreach($u_list as $u){ 
                $output.="<option value='$u'";
                if($u==$urgent){
                    $output.="selected";

                }
                $output.=">$u</option>";
            }
            $output.="</select>";
            echo ($output);
    }

}

?>