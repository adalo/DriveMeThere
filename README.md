DriveMeThere
============

API for DriveMeThere App created for Cape Breton Hackathon 2

App Vision, Features and Components:

- People who have a car and willing to drive people
- People who are looking for a ride
- person who is looking for ride flags their location and destination (general location until ride is confirmed)
- person who has a car sees people near them who are looking for rides and can drill down on each pending ride for details and to discuss/accept the ride
- common routes (i.e. always travelling from ashby to NSCC Monday to Friday)
- Profiles for Drivers & Passengers
	- Driver
		- Comments, Rating, History, Badges for Accomplishment
		- Track a driver’s history of on-time/no show, 
		- Base Route (this can be dynamic once driver begins accepting pickups on that route)
		- Name, Profile Photo, Age, Vehicle Type, Number of Seats, Smoker/Non-Smoker
	- Passenger
		- Comments, Rating, History, Badges
		- Pickup & Dropoff Location pairs
		- Name, Profile Photo, Age, Number of Seats, Smoker/Non-Smoker
	
- Routes
	- driver based
	- origin & destination
	- departure time, estimated arrival
	- when rides are confirmed, waypoints added to route and boundries are redifined


- Rating system for both drivers and passengers
- profile page
- driver route create (including dates the route is driven)
- passenger ride request create (including earliest departure, latest arrival time)
* quick ride request - hitchkiker thumb, leaving now, geo-aware push notification
- index of ride requests for drivers to review
* index of routes for passengers to review and pin requests on
* map of day's route for driver


====

Future Features:

- Sign on with Facebook & Facebook integration (I.E. rides with friends, co workers etc.)
- leapfrog fulfillment of routes (i.e. we can't get your to X but we can get you to Y and then X with two hops)
- calculate carbon credits saved from a ride
- ability to bid what you'll pay for the route / transfer funds through app
- communication "Ride Accepted", "On the way", "Running late", "Cancelled", "Missed Pickup"

====

Database Schema:

Users
- Id (int) ...primary key, max 11 digits
- Email (str)
- CryptedPassword (str)
- Driver (bool)
- Passenger (bool)
- FullName (str)
- Age (int) - max 3 digits
- Smoker (bool)

Routes
- Id (int) ...primary key, max 11 digits
- Driver (int) ...joins to a users.id, max 11 digits
- OriginAddress (str)
- OriginCoordinates (points) ...calculated from posting origin_address to API
- DestinationAddress (str)
- DestinationCoordinates (str) ...should be a CSV pair of coordinates i.e. “45.28181832,47.2812818” 
- DepartureTime (time) ...HH:MM:SS
- LatestArrivalTime (time) ...HH:MM:SS
- EstimatedArrivalTime (time) ...HH:MM:SS, calculated from posting route to API
- DaysAvailable (str) ...should be a CSV list of days enabled i.e. “1, 3, 7” would map to Mon, Wed, Fri
- TotalSeatsAvailable (int)

RideRequests
- Id
- Passenger (int) ...joins to a users.id
- OriginAddress (str)
- OriginCoordinates (str)
- DesintationAddress (str)
- DesinationCoordinates (str)
- PreferredDepartureTime (time)
- LastestArrivalTime (time) 
- DaysRequired (int)

Trips
- Route (int) ...joins to a routes.id
- TripDate (date)
- RideRequest (int)

