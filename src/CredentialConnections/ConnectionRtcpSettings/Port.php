<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\ConnectionRtcpSettings;

/**
 * RTCP port by default is rtp+1, it can also be set to rtcp-mux.
 */
enum Port: string
{
    case RTCP_MUX = 'rtcp-mux';

    case RTP_1 = 'rtp+1';
}
