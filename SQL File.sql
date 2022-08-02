create table member(mem_id number(5) not null, name varchar2(15) not null, register_date varchar2(20), address varchar2(15), phone_no number(11) , NIC number(13) not null,constraint mem_pk primary key(mem_id));
insert into member
values(12,'Anser','12 June 2020','Bahria Town',03456789887,374064392);
insert into member
values(14,'Ibtisam','12 April 2021','Model Town',03456543287,37406332);
insert into member
values(16,'Talha','9 Nov 2019','DHA',0333663637,37411111);

create table fitness_checklist(list_no number(10) not null , push_up number(3), pull_up number(3) ,chin_up number(3) , kg_lifting number(3) , bench_press number(3), mem_id number(5), constraint fit_pk primary key(list_no),constraint fit_mem_fk foreign key(mem_id) references member(mem_id));
insert into fitness_checklist
values(2,30,30,30,60,30,12);
insert into fitness_checklist
values(1,15,15,10,30,5,14);
insert into fitness_checklist
values(3,25,20,20,45,15,16);

create table exercise_chart(ex_chart_id number(10) not null, arms varchar2(20), thigh varchar2(20) , chest varchar2(20), other_discription varchar2(200), constraint ex_pk primary key(ex_chart_id));
insert into exercise_chart
values(11,'10','10','10','Need to do all arms , thighs and chest at one time');
insert into exercise_chart
values(22,'20','20','20','Need to do all arms , thighs and chest at one time');
insert into exercise_chart
values(28,'30','40','40','Can perform by dividing task into two parts');

create table diet_plan(d_plan_id number(10) not null, breakfast varchar2(100),lunch varchar2(100), dinner varchar2(100),supper varchar2(100), fruits varchar2(100),
insert into diet_plan
values(1,'Egg','Salad','Vegetable','Sandwich','Apple');
insert into diet_plan
values(2,'Dates','Salad','Chicken','Sandwich','Oranges');
insert into diet_plan
values(3,'Almonds','Salad','Wings','Milk','Apple');

create table cal_intake (c_plan_id number(10) not null, proteins varchar2(10), fats varchar2(10),carbo varchar2(10), vitamins varchar2(10), water varchar2(10), total_cal varchar2(10) , constraint cal_plan_id_pk primary key(c_plan_id));
insert into cal_intake
values(10,'10','10','10','10','10','40');
insert into cal_intake
values(20,'15','15','15','15','10','60');
insert into cal_intake
values(30,'20','20','20','20','8','80');

create table workout_plan(w_plan_id number(10) not null, muscle_group varchar2(10),bmi varchar2(10), age number(3),workout_time varchar2(10),d_plan_id number(10) not null,c_plan_id number(10) not null, ex_chart_id number(10) not null,mem_id number (5),constraint plan_id_pk primary key(w_plan_id), constraint work_diet_fk foreign key(d_plan_id) references diet_plan(d_plan_id), constraint work_cal_fk foreign key(c_plan_id) references cal_intake(c_plan_id), constraint work_ex_fk foreign key(ex_chart_id) references exercise_chart(ex_chart_id),constraint plan_mem_fk foreign key(mem_id) references member(mem_id));
insert into workout_plan
values(81,'4 Jan 2020',1,10,11,10,12);
insert into workout_plan
values(71,'7 March 2010',2,20,22,50,14);
insert into workout_plan
values(91,'2 April 2021',3,30,28,70,16);

create table weight_record ( w_id number(10) not null, dates varchar2(20) , w_registered number(3) , w_current number(3), w_weak_ago number(3) , mem_id number(10) ,constraint w_pk primary key(w_id),constraint foreign key(mem_id) references member(mem_id);
insert into weight_record
values(16,'12 Feb 2010',80,65,66,21);