<?php

namespace Telnyx;

/**
 * Events are our way of letting you know when something interesting happens in
 * your account. See webhooks: 
 *
 * Events occur when the state of another API resource changes. The state of that
 * resource at the time of the change is embedded in the event's data field. For
 * example, a <code>charge.succeeded</code> event will contain a charge, and an
 * <code>invoice.payment_failed</code> event will contain an invoice.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
  */
class Event extends ApiResource
{
    const OBJECT_NAME = 'event';
}
