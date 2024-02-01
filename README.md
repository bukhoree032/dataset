# Yala Rajabhat Dataset@2020
### Database/Tables
- store_*
- household_info_*
	- fk_store
- household_member_*
	- fk_household_info
- household_member_general_*
	- fk_household_member
- household_member_health_*
	- fk_household_member
- household_econ_*
	- fk_household_info
- household_envir_*
	- fk_household_info
- household_political_*
	- fk_household_info
- household_comunicat_*
	- fk_household_info
- household_suggestion_*
	- fk_household_info
	
### Example URL
- GET `http://127.0.0.1:8000/admin/household/store/18/info`
- GET `http://127.0.0.1:8000/admin/household/store/18/info/20/member`
- GET `http://127.0.0.1:8000/admin/household/store/18/info/20/member/1/step1`
- GET `http://127.0.0.1:8000/admin/household/store/18/info/20/member/1/step2`
- GET `http://127.0.0.1:8000/admin/household/store/18/info/20/econ`
- GET `http://127.0.0.1:8000/admin/household/store/18/info/20/envir`
- GET `http://127.0.0.1:8000/admin/household/store/18/info/20/political`
- GET `http://127.0.0.1:8000/admin/household/store/18/info/20/communicat`
