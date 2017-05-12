CREATE or REPLACE VIEW vw_respondent_results
  AS SELECT S.survey_id SURVEY_ID, 
  R.email EMAIL,
  R.gender GENDER,
  R.age AGE,
  R.educational_attainment EDUCATIONAL_ATTAINMENT,  
  R.occupation OCCUPATION,
  R.web_hours WEB_HOURS,
  R.ngo_id  NGO,
  S.set_code SET_CODE,
  SA1.site_name WEBSITE_1,
  SA1.site_mod MOD_1,
  SA1.orig_rating ORIG_RATING_1,
  SA1.orig_comments ORIG_COMMENTS_1,
  SA1.mod_rating MOD_RATING_1,
  SA1.mod_comments MOD_COMMENTS_1,
  SA1.believable BELIEVABLE_1,
  SA1.color COLOR_1,
  SA1.font FONT_1,
  SA1.graphics GRAPHICS_1,
  SA1.branding BRANDING_1,
  SA1.layout LAYOUT_1,
  SA1.navigation NAVIGATION_1,
  SA1.sidebar SIDEBAR_1,
  SA1.content CONTENT_1,
  SA2.site_name WEBSITE_2,
  SA2.site_mod MOD_2,
  SA2.orig_rating ORIG_RATING_2,
  SA2.orig_comments ORIG_COMMENTS_2,
  SA2.mod_rating MOD_RATING_2,
  SA2.mod_comments MOD_COMMENTS_2,
  SA2.believable BELIEVABLE_2,
  SA2.color COLOR_2,
  SA2.font FONT_2,
  SA2.graphics GRAPHICS_2,
  SA2.branding BRANDING_2,
  SA2.layout LAYOUT_2,
  SA2.navigation NAVIGATION_2,
  SA2.sidebar SIDEBAR_2,
  SA2.content CONTENT_2
FROM `survey` S
  left join `respondent` R on S.respondent_id = R.respondent_id
  left join `survey_set` SS on S.set_code = SS.set_code
  left join `site_answer` SA1 on S.survey_id = SA1.survey_id
    and SS.site_1 = SA1.site_name
  left join `site_answer` SA2 on S.survey_id = SA2.survey_id
    and SS.site_2 = SA2.site_name