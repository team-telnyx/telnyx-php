<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging10dlc;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Campaign\TelnyxCampaignCsp;
use Telnyx\Messaging10dlc\CampaignBuilder\CampaignBuilderSubmitParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlc\CampaignBuilderRawContract;

/**
 * Campaign operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CampaignBuilderRawService implements CampaignBuilderRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Before creating a campaign, use the [Qualify By Usecase endpoint](https://developers.telnyx.com/api-reference/campaign/qualify-by-usecase) to ensure that the brand you want to assign a new campaign to is qualified for the desired use case of that campaign. **Please note:** After campaign creation, you'll only be able to edit the campaign's sample messages. Creating a campaign will entail an upfront, non-refundable three month's cost that will depend on the campaign's use case ([see 10DLC Costs section for details](https://developers.telnyx.com/api-reference/campaign/get-campaign-cost)).
     *
     * @param array{
     *   brandID: string,
     *   description: string,
     *   usecase: string,
     *   ageGated?: bool,
     *   autoRenewal?: bool,
     *   directLending?: bool,
     *   embeddedLink?: bool,
     *   embeddedLinkSample?: string,
     *   embeddedPhone?: bool,
     *   helpKeywords?: string,
     *   helpMessage?: string,
     *   messageFlow?: string,
     *   mnoIDs?: list<int>,
     *   numberPool?: bool,
     *   optinKeywords?: string,
     *   optinMessage?: string,
     *   optoutKeywords?: string,
     *   optoutMessage?: string,
     *   privacyPolicyLink?: string,
     *   referenceID?: string,
     *   resellerID?: string,
     *   sample1?: string,
     *   sample2?: string,
     *   sample3?: string,
     *   sample4?: string,
     *   sample5?: string,
     *   subscriberHelp?: bool,
     *   subscriberOptin?: bool,
     *   subscriberOptout?: bool,
     *   subUsecases?: list<string>,
     *   tag?: list<string>,
     *   termsAndConditions?: bool,
     *   termsAndConditionsLink?: string,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|CampaignBuilderSubmitParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TelnyxCampaignCsp>
     *
     * @throws APIException
     */
    public function submit(
        array|CampaignBuilderSubmitParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CampaignBuilderSubmitParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: '10dlc/campaignBuilder',
            body: (object) $parsed,
            options: $options,
            convert: TelnyxCampaignCsp::class,
        );
    }
}
