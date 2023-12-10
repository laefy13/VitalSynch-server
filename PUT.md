#### PUT
* tested with Form URL Encoded (which what I mostly used in the samples)
     * sample : /api/updateLabRep/labrep_ptnt_id=1&labrep_test_date=2023%2F10%2F15&labrep_test_time=20%3A30&labrep_result=dead&labrep_type=dead&labrep_id=1
* also tested with Multipart Form, but the request would have to be a POSt with a key '_method' and variable 'PUT'. Example:
![multipartform](screenshots/post-updateAllergies.png)
* the Form URL Encoded is recommended for the most requests, while the Multipart Form is recommended for requests where a file will also be sent, like in the Doctor Profile

```bash
  /updateApp_forms
```
![app_forms](screenshots/put-updateApp_forms.png)

```bash
  /updateAllergies
```
![allergies](screenshots/put-updateAllergies.png)

```bash
  /updateLogs
```
![logs](screenshots/put-updateLogs.png)

```bash
  /updateLab_rep
```
![lab_rep](screenshots/put-updateLabrep.png)

```bash
  /updateGrdn_prof
```
![grdn_prof](screenshots/put-updateGrdn_prof.png)

```bash
  /updateDrugs
```
![drugs](screenshots/put-updateDrugs.png)

```bash
  /updateDoctor_prof
```
![doctor_prof](screenshots/put-updateDoctor_prof.png)