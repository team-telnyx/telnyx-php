<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\PhoneNumbers;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\PhoneNumbers\ConversationalComponentsContract;
use Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentListResponse;
use Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentPatchAllParams\Command;
use Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentPatchAllResponse;

/**
 * Manage Whatsapp phone numbers.
 *
 * @phpstan-import-type CommandShape from \Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentPatchAllParams\Command
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ConversationalComponentsService implements ConversationalComponentsContract
{
    /**
     * @api
     */
    public ConversationalComponentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ConversationalComponentsRawService($client);
    }

    /**
     * @api
     *
     * Get phone number conversational components
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): ConversationalComponentListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($phoneNumber, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update phone number conversational components
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
    ): ConversationalComponentPatchAllResponse {
        $params = Util::removeNulls(
            ['commands' => $commands, 'iceBreakers' => $iceBreakers]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->patchAll($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
