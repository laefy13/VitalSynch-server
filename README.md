# VitalSynch Server

The repository that contains the development server of the VitalSycnh

## How to run the server to local environment

- Clone the repo
- Run in terminal

```bash
php artisan migrate
php artisan serve
```

## API Reference
#### GET
* check GET.md for the api route with image samples
```bash
  /app_forms
  /usr_acc
  /ptnt_prof
  /procd_form
  /allergies
  /logs
  /pat_allergies
  /lab_rep
  /med_his
  /grdn_prof
```

#### POST
* only tested with multipart form yet

```bash
  /app_forms
```
![app_forms](screenshots/post-app_forms.png)

```bash
  /usr_acc
```
![useer_acc](screenshots/post-user_acc.png)

```bash
  /ptnt_prof
```
![ptnt_prof](screenshots/post-ptnt_prof.png)

```bash
  /procd_form
```
![procd_form](screenshots/post-procd_form.png)

```bash
  /allergies
```
![allergies](screenshots/post-allergies.png)

```bash
  /logs
```
![logs](screenshots/post-logs.png)

```bash
  /pat_allergies
```
![pat_allergies](screenshots/post-pa_pat_allergies.png)

```bash
  /lab_rep
```
![lab_rep](screenshots/post-lab_rep.png)

```bash
  /med_his
```
![med_his](screenshots/post-med_his.png)

```bash
  /grdn_prof
```
![grdn_prof](screenshots/post-grdn_prof.png)


## Changes
* Dec 9, 2023
     * lab_rep, med_his, grdn_prof api routes
     * GET.md
