<table cellspacing="0" cellpadding="0" style="text-align:left;background-color:white;width:100%;border-spacing:0;border-collapse:collapse;margin:0;padding:0;border-width:0;">
  <tbody>
    <tr>
      <td style="color:black;font-size:15px;font-family:Helvetica Neue,helvetica,arial,sans-serif;text-align:left;vertical-align:top;background-color:white;border-spacing:0;border-collapse:collapse;padding:0;line-height:19px;"><table cellspacing="0" cellpadding="0" style="text-align:left;background-color:white;width:100%;border-spacing:0;border-collapse:collapse;margin:0;padding:0;border-width:0;">
          <tbody> 
            <tr>
              <td style="color:black;font-size:15px;font-family:Helvetica Neue,helvetica,arial,sans-serif;text-align:left;vertical-align:top;background-color:white;border-spacing:0;border-collapse:collapse;padding:20px 0;line-height:19px;"><table width="100%" cellspacing="0" cellpadding="0" style="text-align:left;background-color:white;border-spacing:0;border-collapse:collapse;margin:0;padding:0;border-width:0;">
                  <tbody>
                    <tr>
                      <td style="color:black;font-size:15px;font-family:Helvetica Neue,helvetica,arial,sans-serif;text-align:left;vertical-align:middle;background-color:white;width:45px;border-spacing:0;border-collapse:collapse;padding:0;line-height:19px;">
					  <img data-imagetype="External" 
					  src="<?php echo $profile_pic;?>" alt="<?php echo $name;?>" title="<?php echo $name;?>" 
					  style="vertical-align:middle;width:45px;height:45px;border-radius:100px;padding:1px;border:1px solid #CCCCCC;-moz-border-radius:100px;max-height:45px;min-height:45px;-webkit-border-radius:100px;">
					  </td>
                      <td width="100%" style="color:#000000;font-size:15px;font-family:Helvetica Neue,helvetica,arial,sans-serif;text-align:left;vertical-align:middle;background-color:white;border-spacing:0;border-collapse:collapse;padding:0 0 0 10px;line-height:19px;"> 
					  <?php echo $name;?> replied on a ticket - <?php echo $title;?>. 
					  </td>
                    </tr>
                    <tr>
                      <td colspan="2" style="color:black;font-size:15px;font-family:Helvetica Neue,helvetica,arial,sans-serif;text-align:left;vertical-align:top;background-color:white;border-spacing:0;border-collapse:collapse;padding:0 0 0 55px;line-height:19px;"><h3 style="color:black;font-size:16px;font-family:Helvetica Neue,helvetica,arial,sans-serif;font-weight:normal;margin:0 0 5px 0;line-height:20px;"> <b>Re: <?php echo $subject;?> </b></h3>
                        <p style="font-size:15px;font-family:Helvetica Neue,helvetica,arial,sans-serif;margin:0 0 10px 0;line-height:15px;"> Department: <?php echo $department;?></p>
						<p style="font-size:15px;font-family:Helvetica Neue,helvetica,arial,sans-serif;margin:0 0 10px 0;line-height:10px;"> Priority: <?php echo $priority;?></p>
                        <div style="margin:0 0 19px 0;padding:0;">
						<b>Message:</b>  <br/>
						<?php echo $message;?>
						</div>
                        <p style="color:black;font-size:15px;font-family:Helvetica Neue,helvetica,arial,sans-serif;margin:0 0 19px 0;line-height:19px;"> <a href="<?php echo $url; ?>" target="_blank" >View this on <?php echo $title;?></a></p></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>  
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>