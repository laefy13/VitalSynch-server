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

```http
  /app_forms
  /usr_acc
  /ptnt_prof
  /procd_form
  /allergies
  /logs
  /pat_allergies
```

#### POST
* only tested with multipart form yet

```http
  /app_forms
```
![app_forms](https://github.com/laefy/VitalSynch-server/raw/main/screenshots/post-app_forms.png)

```http
  /usr_acc
```
![useer_acc](https://github.com/laefy/VitalSynch-server/raw/main/screenshots/post-user_acc.png)

```http
  /ptnt_prof
```
![ptnt_prof](https://github.com/laefy/VitalSynch-server/raw/main/screenshots/post-ptnt_prof.png)

```http
  /procd_form
```
![procd_form](https://github.com/laefy/VitalSynch-server/raw/main/screenshots/post-procd_form.png)

```http
  /allergies
```
![allergies](https://github.com/laefy/VitalSynch-server/raw/main/screenshots/post-allergies.png)

```http
  /logs
```
![logs](https://github.com/laefy/VitalSynch-server/raw/main/screenshots/post-logs.png)

```http
  /pat_allergies
```
![pat_allergies](https://github.com/laefy/VitalSynch-server/raw/main/screenshots/post-pat_allergies.png)

