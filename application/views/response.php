<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>Results</title>
  <style>
    body {
      font-family: ‘Trebuchet MS’, Helvetica, sans-serif;
    }

    .header {
      background-color: #2ba6cb;
    }

    .odd {
      background-color: #eeeeee;
    }

    .even {
      background-color: #fafafa;
    }

  </style>
</head>
<body>
  <table cellspacing="0" cellpadding="10" border="0">
  <tr class="header">
    <td width="100">Survey Id</td>
    <td width="400"><?php echo $site_answer1['survey_id']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Email</td>
    <td width="400"><?php echo $respondent['email']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Gender</td>
    <td width="400"><?php echo $respondent['gender']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Age</td>
    <td width="400"><?php echo $respondent['age']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Educational Attainment</td>
    <td width="400"><?php echo $respondent['educational_attainment']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Occupation</td>
    <td width="400"><?php echo $respondent['occupation']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Web Hours per Day</td>
    <td width="400"><?php echo $respondent['web_hours']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Informed About Government</td>
    <td width="400"><?php echo $respondent['gov_informed']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">NGO</td>
    <td width="400"><?php echo $respondent['ngo_id']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Survey Set</td>
    <td width="400"><?php echo $set_code; ?></td>
  </tr>
  </table>
  <br>
  <table cellspacing="0" cellpadding="10" border="0">
  <tr class="header">
    <td width="100">Website 1</td>
    <td width="400"><?php echo $site_answer1['site_name']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Modification</td>
    <td width="400"><?php echo $site_answer1['site_mod']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Original Rating</td>
    <td width="400"><?php echo $site_answer1['orig_rating']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Original Reasoning</td>
    <td width="400"><?php echo $site_answer1['orig_comments']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Mod Rating</td>
    <td width="400"><?php echo $site_answer1['mod_rating']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Mod Reasoning</td>
    <td width="400"><?php echo $site_answer1['mod_comments']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">More Credible Website</td>
    <td width="400"><?php echo $site_answer1['believable']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Color</td>
    <td width="400"><?php echo $site_answer1['color']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Font</td>
    <td width="400"><?php echo $site_answer1['font']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Graphics</td>
    <td width="400"><?php echo $site_answer1['graphics']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Branding</td>
    <td width="400"><?php echo $site_answer1['branding']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Layout</td>
    <td width="400"><?php echo $site_answer1['layout']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Navigation</td>
    <td width="400"><?php echo $site_answer1['navigation']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Sidebar</td>
    <td width="400"><?php echo $site_answer1['sidebar']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Content</td>
    <td width="400"><?php echo $site_answer1['content']; ?></td>
  </tr>
  </table>
  <br>
  <table cellspacing="0" cellpadding="10" border="0">
  <tr class="header">
    <td width="100">Website 2</td>
    <td width="400"><?php echo $site_answer2['site_name']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Modification</td>
    <td width="400"><?php echo $site_answer2['site_mod']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Original Rating</td>
    <td width="400"><?php echo $site_answer2['orig_rating']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Original Reasoning</td>
    <td width="400"><?php echo $site_answer2['orig_comments']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Mod Rating</td>
    <td width="400"><?php echo $site_answer2['mod_rating']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Mod Reasoning</td>
    <td width="400"><?php echo $site_answer2['mod_comments']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">More Credible Website</td>
    <td width="400"><?php echo $site_answer2['believable']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Color</td>
    <td width="400"><?php echo $site_answer2['color']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Font</td>
    <td width="400"><?php echo $site_answer2['font']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Graphics</td>
    <td width="400"><?php echo $site_answer2['graphics']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Branding</td>
    <td width="400"><?php echo $site_answer2['branding']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Layout</td>
    <td width="400"><?php echo $site_answer2['layout']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Navigation</td>
    <td width="400"><?php echo $site_answer2['navigation']; ?></td>
  </tr>
  <tr class="odd">
    <td width="100">Sidebar</td>
    <td width="400"><?php echo $site_answer2['sidebar']; ?></td>
  </tr>
  <tr class="even">
    <td width="100">Content</td>
    <td width="400"><?php echo $site_answer2['content']; ?></td>
  </tr>
  </table>

</body>
</html>