#!/bin/sh

# Debug: Print environment variables
echo "TELNYX_MOCK_HOST=$TELNYX_MOCK_HOST"
echo "TELNYX_MOCK_PORT=$TELNYX_MOCK_PORT"
echo "TELNYX_MOCK_OPEN_API_URI=$TELNYX_MOCK_OPEN_API_URI"

# Run the original command
exec "$@"
