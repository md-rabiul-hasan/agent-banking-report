---
title: API Reference

language_tabs:
- bash

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#User


<!-- START_a272cb5538e64d8a6e0d476af12c2f61 -->
## api/store-procedure/user-insert
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/store-procedure/user-insert" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"customer_id":9,"nominee_name":"Riyad Hasan","nominee_dob":"2020-01-01","nominee_nid_number":"1231231231","nominee_father_name":"Rafiqul Islam,","nominee_mother_name":"Hasina Begum,","nominee_relation":"Brother,","nominee_address":"Dhaka, Bangladesh,"}'

```



### HTTP Request
`GET api/store-procedure/user-insert`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `customer_id` | integer |  required  | customer_id for slef varification into the E-KYC Example                   : 1
        `nominee_name` | string |  optional  | required. Enter your account nominee name
        `nominee_dob` | date |  required  | Date Format YYYY-MM-DD.
        `nominee_nid_number` | numeric |  required  | Nid number must be 10 or 13 or 17 digits.
        `nominee_father_name` | string |  required  | enter nominee father name .
        `nominee_mother_name` | string |  required  | enter nominee mother name.
        `nominee_relation` | string |  required  | enter nominee and account holder relationship.
        `nominee_address` | text |  required  | enter nominee address .
    
<!-- END_a272cb5538e64d8a6e0d476af12c2f61 -->


