<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\CredentialInbound;

/**
  * This setting allows you to set the format with which the caller's number (ANI) is sent for inbound phone calls.
  * 
 */
enum AniNumberFormat : string
{

    case ANI_NUMBER_FORMAT_+E_164 = "+E.164";

    case E_164 = "E.164";

    case ANI_NUMBER_FORMAT_+E_164_NATIONAL = "+E.164-national";

    case E_164_NATIONAL = "E.164-national";

}