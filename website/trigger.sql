create or replace  function check_event_date() returns trigger as $$
begin
if new.startdate > new.enddate then
raise exception 'Startdate of event needs to be before the Enddate of the event';
end if;
return new;
end;
$$ language plpgsql;

create or replace trigger check_event_date_trigger before insert on EVENTS
for each row execute procedure check_event_date();