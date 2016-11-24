# AmazonMerchant Package
The Recommendations API section of Amazon MWS enables you to programmatically retrieve Amazon Selling Coach recommendations by recommendation category. A recommendation is an actionable, timely, and personalized opportunity to increase your sales and performance.
* Domain: amazon.com
* Credentials: apiKey, apiSecret

## How to get credentials: 
0. Item one 
1. Item two


## AmazonMerchant.getEligibleShippingServices
The GetLastUpdatedTimeForRecommendations operation enables you to check whether there are active recommendations for you in a given recommendation category, and if there are, to check when the recommendations for that category were last updated.

| Field                 | Type       | Description
|-----------------------|------------|----------
| apiKey                | credentials| Required: API key obtained from Amazon.
| apiSecret             | credentials| Required: API secret  obtained from Amazon.
| appName               | String     | Required: The Application name.
| appVersion            | String     | Required: The version of the application.
| region                | String     | Required: The region for endpoint. For example: EU. Possible values: 'NA' (North America), 'EU' (Europe), 'IN' (India), 'CN' (China), 'JP' (Japan). NOTE: This operation is only available in the US, Germany, and UK marketplaces.
| merchantId            | String     | Required: The merchant ID.
| amazonOrderId         | String     | Required: An Amazon-defined order identifier in 3-7-7 format.
| itemList              | JSON       | Required: Array of objects. A list of items to be included in a shipment.
| shipFromAddress       | JSON       | Required: Json object. The address from which the shipment ships. See the appropriate section below.
| packageDimensions     | JSON       | Required: Json object. The package dimensions.
| weight                | JSON       | Required: Json object. The package weight.
| shippingServiceOptions| JSON       | Required: Json object. Extra services offered by the carrier. See the appropriate section below.
| sellerOrderId         | String     | Optional: A seller-defined order identifier.
| mustArriveByDate      | String     | Optional: The date by which the package must arrive to keep the promise to the customer, in ISO 8601 date time format (yyyy-MM-ddTHH:mm:ss.sssZ±hhmm). If MustArriveByDate is specified, only shipping service offers that can be delivered by that date are returned.
| shipDate              | String     | Optional: When used in a request, this is the date that the seller wants to ship the package. When used in a response, this is the date that the package can be shipped by the indicated method. In ISO 8601 date time format (yyyy-MM-ddTHH:mm:ss.sssZ±hhmm)
| labelCustomization    | JSON       | Optional: Label customization options.

#### itemList format
```json
{  
    "Item":[  
        {  
            "OrderItemId":"28207139993814",
            "Quantity":"1"
        },
        {  
            "OrderItemId":"28207139993815",
            "Quantity":"2"
        }
    ]
}
```
#### shipFromAddress format
```json
{  
    "Name": "John Doe",
    "AddressLine1": "1234 Westlake Ave",
    "City": "Seattle",
    "StateOrProvinceCode": "WA",
    "PostalCode": "98121",
    "CountryCode": "US",
    "Email": "example@example.com",
    "Phone": "2061234567"
}
```
#### packageDimensions format
```json
{  
    "Length": "5",
    "Width": "5",
    "Height": "5",
    "Unit": "inches"
}
```
#### weight format
```json
{  
    "Value": "10",
    "Unit": "ounces"
}
```
#### shippingServiceOptions format
```json
{  
    "CarrierWillPickUp": false,
    "DeclaredValue": {
        "CurrencyCode": "USD",
        "Amount": "10.00"
    }
}
```
#### labelCustomization format
```json
{  
    "CustomTextForLabel": "Test text",
    "StandardIdForLabel": "AmazonOrderId"
}
```

## AmazonMerchant.createShipment
This endpoint allows to create a new shipment. Important: The createShipment operation returns a ShipmentId value. Be sure to store this value for future use.

| Field                 | Type       | Description
|-----------------------|------------|----------
| apiKey                | credentials| Required: API key obtained from Amazon.
| apiSecret             | credentials| Required: API secret  obtained from Amazon.
| appName               | String     | Required: The Application name.
| appVersion            | String     | Required: The version of the application.
| region                | String     | Required: The region for endpoint. For example: EU. Possible values: 'NA' (North America), 'EU' (Europe), 'IN' (India), 'CN' (China), 'JP' (Japan). NOTE: This operation is only available in the US, Germany, and UK marketplaces.
| merchantId            | String     | Required: The merchant ID.
| amazonOrderId         | String     | Required: An Amazon-defined order identifier in 3-7-7 format.
| itemList              | JSON       | Required: Array of objects. A list of items to be included in a shipment.
| shipFromAddress       | JSON       | Required: Json object. The address from which the shipment ships. See the appropriate section below.
| packageDimensions     | JSON       | Required: Json object. The package dimensions.
| weight                | JSON       | Required: Json object. The package weight.
| shippingServiceOptions| JSON       | Required: Json object. Extra services offered by the carrier. See the appropriate section below.
| sellerOrderId         | String     | Optional: A seller-defined order identifier.
| mustArriveByDate      | String     | Optional: The date by which the package must arrive to keep the promise to the customer, in ISO 8601 date time format (yyyy-MM-ddTHH:mm:ss.sssZ±hhmm). If MustArriveByDate is specified, only shipping service offers that can be delivered by that date are returned.
| shipDate              | String     | Optional: When used in a request, this is the date that the seller wants to ship the package. When used in a response, this is the date that the package can be shipped by the indicated method. In ISO 8601 date time format (yyyy-MM-ddTHH:mm:ss.sssZ±hhmm)
| labelCustomization    | JSON       | Optional: Json object. Label customization options.
| shippingServiceId     | String     | Required: An Amazon-defined shipping service identifier. Get the ShippingServiceId value from a previous call to the GetEligibleShippingServices operation.
| shippingServiceOfferId| String     | Optional: An Amazon-defined shipping service offer identifier. Get the ShippingServiceOfferId value from a previous call to the GetEligibleShippingServices operation.
| hazmatType            | String     | Optional: Hazardous materials options for a package. Possible values: 'None' - This package does not contain hazardous material; 'LQHazmat' - This package contains limited quantities of hazardous material.

#### itemList format
```json
{  
    "Item":[  
        {  
            "OrderItemId":"28207139993814",
            "Quantity":"1"
        },
        {  
            "OrderItemId":"28207139993815",
            "Quantity":"2"
        }
    ]
}
```
#### shipFromAddress format
```json
{  
    "Name": "John Doe",
    "AddressLine1": "1234 Westlake Ave",
    "City": "Seattle",
    "StateOrProvinceCode": "WA",
    "PostalCode": "98121",
    "CountryCode": "US",
    "Email": "example@example.com",
    "Phone": "2061234567"
}
```
#### packageDimensions format
```json
{  
    "Length": "5",
    "Width": "5",
    "Height": "5",
    "Unit": "inches"
}
```
#### weight format
```json
{  
    "Value": "10",
    "Unit": "ounces"
}
```
#### shippingServiceOptions format
```json
{  
    "CarrierWillPickUp": false,
    "DeclaredValue": {
        "CurrencyCode": "USD",
        "Amount": "10.00"
    }
}
```
#### labelCustomization format
```json
{  
    "CustomTextForLabel": "Test text",
    "StandardIdForLabel": "AmazonOrderId"
}
```

## AmazonMerchant.getShipment
This endpoint returns an existing shipment for the ShipmentId value that you specify.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Required: API key obtained from Amazon.
| apiSecret | credentials| Required: API secret  obtained from Amazon.
| appName   | String     | Required: The Application name.
| appVersion| String     | Required: The version of the application.
| region    | String     | Required: The region for endpoint. For example: EU. Possible values: 'NA' (North America), 'EU' (Europe), 'IN' (India), 'CN' (China), 'JP' (Japan). NOTE: This operation is only available in the US, Germany, and UK marketplaces.
| merchantId| String     | Required: The merchant ID.
| shipmentId| String     | Required: An Amazon-defined shipment identifier. Get the shipmentId value from a previous call to the createShipment operation.


## AmazonMerchant.cancelShipment
The cancelShipment operation cancels an existing shipment and requests a refund for the ShipmentId value that you specify.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Required: API key obtained from Amazon.
| apiSecret | credentials| Required: API secret  obtained from Amazon.
| appName   | String     | Required: The Application name.
| appVersion| String     | Required: The version of the application.
| region    | String     | Required: The region for endpoint. For example: EU. Possible values: 'NA' (North America), 'EU' (Europe), 'IN' (India), 'CN' (China), 'JP' (Japan). NOTE: This operation is only available in the US, Germany, and UK marketplaces.
| merchantId| String     | Required: The merchant ID.
| shipmentId| String     | Required: An Amazon-defined shipment identifier. Get the shipmentId value from a previous call to the createShipment operation.



### shipFromAddress fields

| Name | Description | Required | Values |
| --- | --- | --- | --- |
| Name | The name or business name. | Yes | Maximum: 30 characters. Type: string |
| AddressLine1 | The street address information. | Yes | Maximum: 180 characters. Type: string |
| AddressLine2 | Additional street address information. | No | Maximum: 60 characters. Type: string |
| AddressLine3 | Additional street address information. | No | Maximum: 60 characters. Type: string |
| DistrictOrCounty | The district or county. | No | Maximum: 30 characters. Type: string |
| Email | The email address. | Yes | Maximum: 256 characters. Type: string |
| City | The city. | Yes | Maximum: 30 characters. Type: string |
| StateOrProvinceCode | The state or province code. | No | Maximum: 30 characters. Type: string |
| PostalCode | The zip code or postal code. | Yes | Maximum: 30 characters. Type: string |
| CountryCode | The country code. | Yes | A two-digit [ISO 3166-1 alpha-2 format](../dev_guide/DG_ISO3166.html) country code. Type: string |
| Phone | The phone number. | Yes | Maximum: 30 characters. Type: string |

### shippingServiceOptions fields

| Name | Description | Required | Values |
| --- | --- | --- | --- |
| DeliveryExperience | The delivery confirmation level. | Yes | DeliveryExperience values:__ DeliveryConfirmationWithAdultSignature - Delivery confirmation with adult signature.__ DeliveryConfirmationWithSignature - Delivery confirmation with signature.__ DeliveryConfirmationWithoutSignature - Delivery confirmation without signature.__ NoTracking - No delivery confirmation. Type: string |
| DeclaredValue | The declared value of the shipment. The carrier uses this value to determine how much to insure the shipment for. If DeclaredValue is greater than the carrier's minimum insurance amount, the seller is charged for the additional insurance as determined by the carrier. For information about optional insurance coverage, see the Seller Central Help ([UK](https://sellercentral.amazon.co.uk/gp/help/200204080)) ([US](https://sellercentral.amazon.com/gp/help/200204080)). | No | Default: 0. Type: [CurrencyAmount](MerchFulfill_Datatypes.html#CurrencyAmount "Currency type and amount.") |
| CarrierWillPickUp | Indicates whether the carrier will pick up the package. Note: Scheduled carrier pickup is available only in the US using Dynamex. | Yes | true. if the carrier will pick up the package, otherwise false. |
| LabelFormat | The seller's preferred label format. | No | Must match one of the AvailableLabelFormats returned by getEligibleShippingServices. Type: string |