<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentListResponse;
use Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentPatchAllParams\Command;
use Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentPatchAllResponse;

/**
 * @phpstan-import-type CommandShape from \Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentPatchAllParams\Command
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ConversationalComponentsContract
{
    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): ConversationalComponentListResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param list<Command|CommandShape> $commands List of commands
     * @param list<string> $iceBreakers List of ice breakers
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function patchAll(
        string $phoneNumber,
        ?array $commands = null,
        ?array $iceBreakers = null,
        RequestOptions|array|null $requestOptions = null,
    ): ConversationalComponentPatchAllResponse;
}
