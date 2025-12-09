<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Actions;

use Telnyx\Actions\Register\RegisterCreateParams\Status;
use Telnyx\Actions\Register\RegisterNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface RegisterContract
{
    /**
     * @api
     *
     * @param list<string> $registrationCodes
     * @param string $simCardGroupID The group SIMCardGroup identification. This attribute can be <code>null</code> when it's present in an associated resource.
     * @param 'enabled'|'disabled'|'standby'|Status $status status on which the SIM card will be set after being successful registered
     * @param list<string> $tags Searchable tags associated with the SIM card
     *
     * @throws APIException
     */
    public function create(
        array $registrationCodes,
        ?string $simCardGroupID = null,
        string|Status $status = 'enabled',
        ?array $tags = null,
        ?RequestOptions $requestOptions = null,
    ): RegisterNewResponse;
}
