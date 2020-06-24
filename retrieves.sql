USE NP;

/*BASERAT PÅ ID:
alla kontaktuppgifter*/
-- SELECT m.message, a.title, s.title, c.id, c.clinic_name, c.contact_name, c.phone_nr, c.website_url , c.facebook_url, c.linkedin_url, c.insta_url
-- FROM clinics as c
-- join messages as m
-- on m.clinic_id = c.clinic_id
-- join sections as s
-- on s.clinic_id = c.clinic_id
-- join advices as a
-- on a.clinic_id = c.clinic_id;

#messages
-- select distinct m.message, a.message_id, a.title, m.advice_id, s.title as section_title, t.timeline_title, c.clinic_name
-- from messages as m
-- join advices as a
-- on a.message_id <= m.advice_id
-- join sections as s
-- on s.advice_id <= a.section_id
-- join timelines as t
-- on t.section_id <= s.timeline_id
-- join clinics as c
-- on c.clinic_id = s.clinic_id
-- where c.clinic_id = 2 and t.clinic_id = 2 
-- and m.clinic_id = 2 and a.clinic_id = 2
-- and s.clinic_id = 2
-- order by m.message
-- ;

select distinct m.message_id, m.message, a.advice_id, a.title, 
s.section_id, t.timeline_title, s.timeline_id, c.clinic_name
from messages as m
join advices as a
join sections as s
join clinics as c
join timelines as t
where m.message_id = 2
and m.advice_id = a.advice_id 
and a.section_id = s.section_id
and s.timeline_id = t.timeline_id
and c.clinic_id = 2
order by a.title
;

#select * from sections where clinic_id = 2 and section_id = 2;
#select * from timelines where clinic_id = 2;

-- select distinct t.id, t.timeline_title, s.title, s.timeline_id
-- from timelines as t
-- join sections as s
-- where t.clinic_id = 2 and s.clinic_id = 2 -- and t.section_id = 1;
-- ;

#select * from advices where object_id = 2 and advice_id=2;
show tables;

-- select * from messages where clinic_id = 2;
/*alla advices*/

/*timelines*/
select * from timelines;

/*adresser*/
-- DELETE from contact_details WHERE clinic_id IS NULL;
-- SELECT * from contact_details
#where contact_details.clinic_id = 1;
