/**
 * Global loader object
 * This object is the main notification center for the application.
 */
BOOKS.loader = 
{
	/**
	 * Notification constants used throughout the application
	 */
	notifications: 
	{
		pageInit: "pageInit",
	},

	/**
	 * Map of registered callbacks.
	 * Do not touch this.
	 * @type {Array}
	 */
	_registeredCallbacks: {},

	/**
	 * Registers the given function as a callback for
	 * the given event.
	 * @param  {array} eventsArray Array of event names to register for
	 * @param  {Function} callback
	 * @return {void}
	 */
	registerCallback: function(eventsArray, callback)
	{
		// Verify a valid callback
		if (!callback
			|| typeof callback != "function") 
		{
			return false;
		}

		// Make sure events array is really an array
		if (typeof eventsArray != "object") {
			eventsArray = [eventsArray];
		}

		// Loop, adding to subscriptions
		for (var i = 0; i < eventsArray.length; i++)
		{
			var eventName = eventsArray[i];

			// Make sure event has been initialized
			if (BOOKS.loader._registeredCallbacks[eventName] == null)
			{
				BOOKS.loader._registeredCallbacks[eventName] = [];
			}

			// Add to stack
			BOOKS.loader._registeredCallbacks[eventName].push(callback);
		};
	},

	/**
	 * Calls all the registered callback functions for the event
	 * specified in the order for which they were registered.
	 * @param  {string} eventName
	 * @param  {array} argumentsArray
	 * @return {void}
	 */
	trigger: function(eventName, argumentsArray)
	{
		// Do we have callbacks for this event?
		if (BOOKS.loader._registeredCallbacks[eventName] != null
			&& BOOKS.loader._registeredCallbacks[eventName].length > 0)
		{
			// Make sure arguments are an array
			if (argumentsArray == null)
			{
				argumentsArray = [];
			}

			// Add our event object
			argumentsArray.unshift({
				eventName: eventName
			});

			// Number of events
			var totalEvents = BOOKS.loader._registeredCallbacks[eventName].length;

			// Fire the event for each object
			for (var i = 0; i < totalEvents; i++)
			{
				argumentsArray.eventIndex = i;
				argumentsArray.eventTotal = totalEvents;

				var callback = BOOKS.loader._registeredCallbacks[eventName][i];
				callback.apply(eventName, argumentsArray);
			};
		}
	}
};