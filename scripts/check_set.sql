SELECT SS.set_code, count(S.survey_id)
FROM survey_set SS
  LEFT JOIN survey S on S.set_code = SS.set_code
  LEFT JOIN site_answer SA on SA.survey_id = S.survey_id
GROUP BY SS.set_code
ORDER BY count(S.survey_id) asc
LIMIT 1