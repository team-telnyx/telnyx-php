<?php

declare(strict_types=1);

namespace Telnyx;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Telnyx\Core\BaseClient;
use Telnyx\Core\Util;
use Telnyx\Services\AccessIPAddressService;
use Telnyx\Services\AccessIPRangesService;
use Telnyx\Services\ActionsService;
use Telnyx\Services\AddressesService;
use Telnyx\Services\AdvancedOrdersService;
use Telnyx\Services\AIService;
use Telnyx\Services\AuditEventsService;
use Telnyx\Services\AuthenticationProvidersService;
use Telnyx\Services\AvailablePhoneNumberBlocksService;
use Telnyx\Services\AvailablePhoneNumbersService;
use Telnyx\Services\BalanceService;
use Telnyx\Services\BillingGroupsService;
use Telnyx\Services\BulkSimCardActionsService;
use Telnyx\Services\BundlePricingService;
use Telnyx\Services\CallControlApplicationsService;
use Telnyx\Services\CallEventsService;
use Telnyx\Services\CallsService;
use Telnyx\Services\ChannelZonesService;
use Telnyx\Services\ChargesBreakdownService;
use Telnyx\Services\ChargesSummaryService;
use Telnyx\Services\CommentsService;
use Telnyx\Services\ConferencesService;
use Telnyx\Services\ConnectionsService;
use Telnyx\Services\CountryCoverageService;
use Telnyx\Services\CredentialConnectionsService;
use Telnyx\Services\CustomerServiceRecordsService;
use Telnyx\Services\CustomStorageCredentialsService;
use Telnyx\Services\DetailRecordsService;
use Telnyx\Services\DialogflowConnectionsService;
use Telnyx\Services\DocumentLinksService;
use Telnyx\Services\DocumentsService;
use Telnyx\Services\DynamicEmergencyAddressesService;
use Telnyx\Services\DynamicEmergencyEndpointsService;
use Telnyx\Services\ExternalConnectionsService;
use Telnyx\Services\FaxApplicationsService;
use Telnyx\Services\FaxesService;
use Telnyx\Services\FqdnConnectionsService;
use Telnyx\Services\FqdnsService;
use Telnyx\Services\GlobalIPAllowedPortsService;
use Telnyx\Services\GlobalIPAssignmentHealthService;
use Telnyx\Services\GlobalIPAssignmentsService;
use Telnyx\Services\GlobalIPAssignmentsUsageService;
use Telnyx\Services\GlobalIPHealthChecksService;
use Telnyx\Services\GlobalIPHealthCheckTypesService;
use Telnyx\Services\GlobalIPLatencyService;
use Telnyx\Services\GlobalIPProtocolsService;
use Telnyx\Services\GlobalIPsService;
use Telnyx\Services\GlobalIPUsageService;
use Telnyx\Services\InboundChannelsService;
use Telnyx\Services\InexplicitNumberOrdersService;
use Telnyx\Services\IntegrationSecretsService;
use Telnyx\Services\InventoryCoverageService;
use Telnyx\Services\InvoicesService;
use Telnyx\Services\IPConnectionsService;
use Telnyx\Services\IPsService;
use Telnyx\Services\LedgerBillingGroupReportsService;
use Telnyx\Services\LegacyService;
use Telnyx\Services\ListService;
use Telnyx\Services\ManagedAccountsService;
use Telnyx\Services\MediaService;
use Telnyx\Services\MessagesService;
use Telnyx\Services\Messaging10dlcService;
use Telnyx\Services\MessagingHostedNumberOrdersService;
use Telnyx\Services\MessagingHostedNumbersService;
use Telnyx\Services\MessagingNumbersBulkUpdatesService;
use Telnyx\Services\MessagingOptoutsService;
use Telnyx\Services\MessagingProfilesService;
use Telnyx\Services\MessagingService;
use Telnyx\Services\MessagingTollfreeService;
use Telnyx\Services\MessagingURLDomainsService;
use Telnyx\Services\MobileNetworkOperatorsService;
use Telnyx\Services\MobilePhoneNumbersService;
use Telnyx\Services\MobilePushCredentialsService;
use Telnyx\Services\MobileVoiceConnectionsService;
use Telnyx\Services\NetworkCoverageService;
use Telnyx\Services\NetworksService;
use Telnyx\Services\NotificationChannelsService;
use Telnyx\Services\NotificationEventConditionsService;
use Telnyx\Services\NotificationEventsService;
use Telnyx\Services\NotificationProfilesService;
use Telnyx\Services\NotificationSettingsService;
use Telnyx\Services\NumberBlockOrdersService;
use Telnyx\Services\NumberLookupService;
use Telnyx\Services\NumberOrderPhoneNumbersService;
use Telnyx\Services\NumberOrdersService;
use Telnyx\Services\NumberReservationsService;
use Telnyx\Services\NumbersFeaturesService;
use Telnyx\Services\OAuthClientsService;
use Telnyx\Services\OAuthGrantsService;
use Telnyx\Services\OAuthService;
use Telnyx\Services\OperatorConnectService;
use Telnyx\Services\OrganizationsService;
use Telnyx\Services\OtaUpdatesService;
use Telnyx\Services\OutboundVoiceProfilesService;
use Telnyx\Services\PaymentService;
use Telnyx\Services\PhoneNumberBlocksService;
use Telnyx\Services\PhoneNumbersRegulatoryRequirementsService;
use Telnyx\Services\PhoneNumbersService;
use Telnyx\Services\PortabilityChecksService;
use Telnyx\Services\PortingOrdersService;
use Telnyx\Services\PortingPhoneNumbersService;
use Telnyx\Services\PortingService;
use Telnyx\Services\PortoutsService;
use Telnyx\Services\PrivateWirelessGatewaysService;
use Telnyx\Services\PublicInternetGatewaysService;
use Telnyx\Services\QueuesService;
use Telnyx\Services\RcsAgentsService;
use Telnyx\Services\RecordingsService;
use Telnyx\Services\RecordingTranscriptionsService;
use Telnyx\Services\RegionsService;
use Telnyx\Services\RegulatoryRequirementsService;
use Telnyx\Services\ReportsService;
use Telnyx\Services\RequirementGroupsService;
use Telnyx\Services\RequirementsService;
use Telnyx\Services\RequirementTypesService;
use Telnyx\Services\RoomCompositionsService;
use Telnyx\Services\RoomParticipantsService;
use Telnyx\Services\RoomRecordingsService;
use Telnyx\Services\RoomsService;
use Telnyx\Services\SetiService;
use Telnyx\Services\ShortCodesService;
use Telnyx\Services\SimCardDataUsageNotificationsService;
use Telnyx\Services\SimCardGroupsService;
use Telnyx\Services\SimCardOrderPreviewService;
use Telnyx\Services\SimCardOrdersService;
use Telnyx\Services\SimCardsService;
use Telnyx\Services\SiprecConnectorsService;
use Telnyx\Services\SpeechToTextService;
use Telnyx\Services\StorageService;
use Telnyx\Services\SubNumberOrdersReportService;
use Telnyx\Services\SubNumberOrdersService;
use Telnyx\Services\TelephonyCredentialsService;
use Telnyx\Services\TexmlApplicationsService;
use Telnyx\Services\TexmlService;
use Telnyx\Services\TextToSpeechService;
use Telnyx\Services\UsageReportsService;
use Telnyx\Services\UserAddressesService;
use Telnyx\Services\UserTagsService;
use Telnyx\Services\VerificationsService;
use Telnyx\Services\VerifiedNumbersService;
use Telnyx\Services\VerifyProfilesService;
use Telnyx\Services\VirtualCrossConnectsCoverageService;
use Telnyx\Services\VirtualCrossConnectsService;
use Telnyx\Services\WebhookDeliveriesService;
use Telnyx\Services\WebhooksService;
use Telnyx\Services\WellKnownService;
use Telnyx\Services\WireguardInterfacesService;
use Telnyx\Services\WireguardPeersService;
use Telnyx\Services\WirelessBlocklistsService;
use Telnyx\Services\WirelessBlocklistValuesService;
use Telnyx\Services\WirelessService;

/**
 * @phpstan-import-type NormalizedRequest from \Telnyx\Core\BaseClient
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
class Client extends BaseClient
{
    public string $apiKey;

    public string $clientID;

    public string $clientSecret;

    public string $publicKey;

    public bool $baseUrlOverridden;

    /**
     * @api
     */
    public LegacyService $legacy;

    /**
     * @api
     */
    public OAuthService $oauth;

    /**
     * @api
     */
    public OAuthClientsService $oauthClients;

    /**
     * @api
     */
    public OAuthGrantsService $oauthGrants;

    /**
     * @api
     */
    public WebhooksService $webhooks;

    /**
     * @api
     */
    public AccessIPAddressService $accessIPAddress;

    /**
     * @api
     */
    public AccessIPRangesService $accessIPRanges;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @api
     */
    public AddressesService $addresses;

    /**
     * @api
     */
    public AdvancedOrdersService $advancedOrders;

    /**
     * @api
     */
    public AIService $ai;

    /**
     * @api
     */
    public AuditEventsService $auditEvents;

    /**
     * @api
     */
    public AuthenticationProvidersService $authenticationProviders;

    /**
     * @api
     */
    public AvailablePhoneNumberBlocksService $availablePhoneNumberBlocks;

    /**
     * @api
     */
    public AvailablePhoneNumbersService $availablePhoneNumbers;

    /**
     * @api
     */
    public BalanceService $balance;

    /**
     * @api
     */
    public BillingGroupsService $billingGroups;

    /**
     * @api
     */
    public BulkSimCardActionsService $bulkSimCardActions;

    /**
     * @api
     */
    public BundlePricingService $bundlePricing;

    /**
     * @api
     */
    public CallControlApplicationsService $callControlApplications;

    /**
     * @api
     */
    public CallEventsService $callEvents;

    /**
     * @api
     */
    public CallsService $calls;

    /**
     * @api
     */
    public ChannelZonesService $channelZones;

    /**
     * @api
     */
    public ChargesBreakdownService $chargesBreakdown;

    /**
     * @api
     */
    public ChargesSummaryService $chargesSummary;

    /**
     * @api
     */
    public CommentsService $comments;

    /**
     * @api
     */
    public ConferencesService $conferences;

    /**
     * @api
     */
    public ConnectionsService $connections;

    /**
     * @api
     */
    public CountryCoverageService $countryCoverage;

    /**
     * @api
     */
    public CredentialConnectionsService $credentialConnections;

    /**
     * @api
     */
    public CustomStorageCredentialsService $customStorageCredentials;

    /**
     * @api
     */
    public CustomerServiceRecordsService $customerServiceRecords;

    /**
     * @api
     */
    public DetailRecordsService $detailRecords;

    /**
     * @api
     */
    public DialogflowConnectionsService $dialogflowConnections;

    /**
     * @api
     */
    public DocumentLinksService $documentLinks;

    /**
     * @api
     */
    public DocumentsService $documents;

    /**
     * @api
     */
    public DynamicEmergencyAddressesService $dynamicEmergencyAddresses;

    /**
     * @api
     */
    public DynamicEmergencyEndpointsService $dynamicEmergencyEndpoints;

    /**
     * @api
     */
    public ExternalConnectionsService $externalConnections;

    /**
     * @api
     */
    public FaxApplicationsService $faxApplications;

    /**
     * @api
     */
    public FaxesService $faxes;

    /**
     * @api
     */
    public FqdnConnectionsService $fqdnConnections;

    /**
     * @api
     */
    public FqdnsService $fqdns;

    /**
     * @api
     */
    public GlobalIPAllowedPortsService $globalIPAllowedPorts;

    /**
     * @api
     */
    public GlobalIPAssignmentHealthService $globalIPAssignmentHealth;

    /**
     * @api
     */
    public GlobalIPAssignmentsService $globalIPAssignments;

    /**
     * @api
     */
    public GlobalIPAssignmentsUsageService $globalIPAssignmentsUsage;

    /**
     * @api
     */
    public GlobalIPHealthCheckTypesService $globalIPHealthCheckTypes;

    /**
     * @api
     */
    public GlobalIPHealthChecksService $globalIPHealthChecks;

    /**
     * @api
     */
    public GlobalIPLatencyService $globalIPLatency;

    /**
     * @api
     */
    public GlobalIPProtocolsService $globalIPProtocols;

    /**
     * @api
     */
    public GlobalIPUsageService $globalIPUsage;

    /**
     * @api
     */
    public GlobalIPsService $globalIPs;

    /**
     * @api
     */
    public InboundChannelsService $inboundChannels;

    /**
     * @api
     */
    public IntegrationSecretsService $integrationSecrets;

    /**
     * @api
     */
    public InventoryCoverageService $inventoryCoverage;

    /**
     * @api
     */
    public InvoicesService $invoices;

    /**
     * @api
     */
    public IPConnectionsService $ipConnections;

    /**
     * @api
     */
    public IPsService $ips;

    /**
     * @api
     */
    public LedgerBillingGroupReportsService $ledgerBillingGroupReports;

    /**
     * @api
     */
    public ListService $list;

    /**
     * @api
     */
    public ManagedAccountsService $managedAccounts;

    /**
     * @api
     */
    public MediaService $media;

    /**
     * @api
     */
    public MessagesService $messages;

    /**
     * @api
     */
    public MessagingService $messaging;

    /**
     * @api
     */
    public MessagingHostedNumberOrdersService $messagingHostedNumberOrders;

    /**
     * @api
     */
    public MessagingHostedNumbersService $messagingHostedNumbers;

    /**
     * @api
     */
    public MessagingNumbersBulkUpdatesService $messagingNumbersBulkUpdates;

    /**
     * @api
     */
    public MessagingOptoutsService $messagingOptouts;

    /**
     * @api
     */
    public MessagingProfilesService $messagingProfiles;

    /**
     * @api
     */
    public MessagingTollfreeService $messagingTollfree;

    /**
     * @api
     */
    public MessagingURLDomainsService $messagingURLDomains;

    /**
     * @api
     */
    public MobileNetworkOperatorsService $mobileNetworkOperators;

    /**
     * @api
     */
    public MobilePushCredentialsService $mobilePushCredentials;

    /**
     * @api
     */
    public NetworkCoverageService $networkCoverage;

    /**
     * @api
     */
    public NetworksService $networks;

    /**
     * @api
     */
    public NotificationChannelsService $notificationChannels;

    /**
     * @api
     */
    public NotificationEventConditionsService $notificationEventConditions;

    /**
     * @api
     */
    public NotificationEventsService $notificationEvents;

    /**
     * @api
     */
    public NotificationProfilesService $notificationProfiles;

    /**
     * @api
     */
    public NotificationSettingsService $notificationSettings;

    /**
     * @api
     */
    public NumberBlockOrdersService $numberBlockOrders;

    /**
     * @api
     */
    public NumberLookupService $numberLookup;

    /**
     * @api
     */
    public NumberOrderPhoneNumbersService $numberOrderPhoneNumbers;

    /**
     * @api
     */
    public NumberOrdersService $numberOrders;

    /**
     * @api
     */
    public NumberReservationsService $numberReservations;

    /**
     * @api
     */
    public NumbersFeaturesService $numbersFeatures;

    /**
     * @api
     */
    public OperatorConnectService $operatorConnect;

    /**
     * @api
     */
    public OtaUpdatesService $otaUpdates;

    /**
     * @api
     */
    public OutboundVoiceProfilesService $outboundVoiceProfiles;

    /**
     * @api
     */
    public PaymentService $payment;

    /**
     * @api
     */
    public PhoneNumberBlocksService $phoneNumberBlocks;

    /**
     * @api
     */
    public PhoneNumbersService $phoneNumbers;

    /**
     * @api
     */
    public PhoneNumbersRegulatoryRequirementsService $phoneNumbersRegulatoryRequirements;

    /**
     * @api
     */
    public PortabilityChecksService $portabilityChecks;

    /**
     * @api
     */
    public PortingService $porting;

    /**
     * @api
     */
    public PortingOrdersService $portingOrders;

    /**
     * @api
     */
    public PortingPhoneNumbersService $portingPhoneNumbers;

    /**
     * @api
     */
    public PortoutsService $portouts;

    /**
     * @api
     */
    public PrivateWirelessGatewaysService $privateWirelessGateways;

    /**
     * @api
     */
    public PublicInternetGatewaysService $publicInternetGateways;

    /**
     * @api
     */
    public QueuesService $queues;

    /**
     * @api
     */
    public RcsAgentsService $rcsAgents;

    /**
     * @api
     */
    public RecordingTranscriptionsService $recordingTranscriptions;

    /**
     * @api
     */
    public RecordingsService $recordings;

    /**
     * @api
     */
    public RegionsService $regions;

    /**
     * @api
     */
    public RegulatoryRequirementsService $regulatoryRequirements;

    /**
     * @api
     */
    public ReportsService $reports;

    /**
     * @api
     */
    public RequirementGroupsService $requirementGroups;

    /**
     * @api
     */
    public RequirementTypesService $requirementTypes;

    /**
     * @api
     */
    public RequirementsService $requirements;

    /**
     * @api
     */
    public RoomCompositionsService $roomCompositions;

    /**
     * @api
     */
    public RoomParticipantsService $roomParticipants;

    /**
     * @api
     */
    public RoomRecordingsService $roomRecordings;

    /**
     * @api
     */
    public RoomsService $rooms;

    /**
     * @api
     */
    public SetiService $seti;

    /**
     * @api
     */
    public ShortCodesService $shortCodes;

    /**
     * @api
     */
    public SimCardDataUsageNotificationsService $simCardDataUsageNotifications;

    /**
     * @api
     */
    public SimCardGroupsService $simCardGroups;

    /**
     * @api
     */
    public SimCardOrderPreviewService $simCardOrderPreview;

    /**
     * @api
     */
    public SimCardOrdersService $simCardOrders;

    /**
     * @api
     */
    public SimCardsService $simCards;

    /**
     * @api
     */
    public SiprecConnectorsService $siprecConnectors;

    /**
     * @api
     */
    public StorageService $storage;

    /**
     * @api
     */
    public SubNumberOrdersService $subNumberOrders;

    /**
     * @api
     */
    public SubNumberOrdersReportService $subNumberOrdersReport;

    /**
     * @api
     */
    public TelephonyCredentialsService $telephonyCredentials;

    /**
     * @api
     */
    public TexmlService $texml;

    /**
     * @api
     */
    public TexmlApplicationsService $texmlApplications;

    /**
     * @api
     */
    public TextToSpeechService $textToSpeech;

    /**
     * @api
     */
    public UsageReportsService $usageReports;

    /**
     * @api
     */
    public UserAddressesService $userAddresses;

    /**
     * @api
     */
    public UserTagsService $userTags;

    /**
     * @api
     */
    public VerificationsService $verifications;

    /**
     * @api
     */
    public VerifiedNumbersService $verifiedNumbers;

    /**
     * @api
     */
    public VerifyProfilesService $verifyProfiles;

    /**
     * @api
     */
    public VirtualCrossConnectsService $virtualCrossConnects;

    /**
     * @api
     */
    public VirtualCrossConnectsCoverageService $virtualCrossConnectsCoverage;

    /**
     * @api
     */
    public WebhookDeliveriesService $webhookDeliveries;

    /**
     * @api
     */
    public WireguardInterfacesService $wireguardInterfaces;

    /**
     * @api
     */
    public WireguardPeersService $wireguardPeers;

    /**
     * @api
     */
    public WirelessService $wireless;

    /**
     * @api
     */
    public WirelessBlocklistValuesService $wirelessBlocklistValues;

    /**
     * @api
     */
    public WirelessBlocklistsService $wirelessBlocklists;

    /**
     * @api
     */
    public WellKnownService $wellKnown;

    /**
     * @api
     */
    public InexplicitNumberOrdersService $inexplicitNumberOrders;

    /**
     * @api
     */
    public MobilePhoneNumbersService $mobilePhoneNumbers;

    /**
     * @api
     */
    public MobileVoiceConnectionsService $mobileVoiceConnections;

    /**
     * @api
     */
    public Messaging10dlcService $messaging10dlc;

    /**
     * @api
     */
    public SpeechToTextService $speechToText;

    /**
     * @api
     */
    public OrganizationsService $organizations;

    /**
     * @param RequestOpts|null $requestOptions
     */
    public function __construct(
        ?string $apiKey = null,
        ?string $clientID = null,
        ?string $clientSecret = null,
        ?string $publicKey = null,
        ?string $baseUrl = null,
        RequestOptions|array|null $requestOptions = null,
    ) {
        $this->apiKey = (string) ($apiKey ?? Util::getenv('TELNYX_API_KEY'));
        $this->clientID = (string) ($clientID ?? Util::getenv('TELNYX_CLIENT_ID'));
        $this->clientSecret = (string) ($clientSecret ?? Util::getenv(
            'TELNYX_CLIENT_SECRET'
        ));
        $this->publicKey = (string) ($publicKey ?? Util::getenv(
            'TELNYX_PUBLIC_KEY'
        ));

        $this->baseUrlOverridden = !is_null($baseUrl);

        $baseUrl ??= Util::getenv('TELNYX_BASE_URL') ?: 'https://api.telnyx.com/v2';

        $options = RequestOptions::parse(
            RequestOptions::with(
                uriFactory: Psr17FactoryDiscovery::findUriFactory(),
                streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
                requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
                transporter: Psr18ClientDiscovery::find(),
            ),
            $requestOptions,
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('telnyx/PHP %s', VERSION),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '6.11.0',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            baseUrl: $baseUrl,
            options: $options
        );

        $this->legacy = new LegacyService($this);
        $this->oauth = new OAuthService($this);
        $this->oauthClients = new OAuthClientsService($this);
        $this->oauthGrants = new OAuthGrantsService($this);
        $this->webhooks = new WebhooksService($this);
        $this->accessIPAddress = new AccessIPAddressService($this);
        $this->accessIPRanges = new AccessIPRangesService($this);
        $this->actions = new ActionsService($this);
        $this->addresses = new AddressesService($this);
        $this->advancedOrders = new AdvancedOrdersService($this);
        $this->ai = new AIService($this);
        $this->auditEvents = new AuditEventsService($this);
        $this->authenticationProviders = new AuthenticationProvidersService($this);
        $this->availablePhoneNumberBlocks = new AvailablePhoneNumberBlocksService($this);
        $this->availablePhoneNumbers = new AvailablePhoneNumbersService($this);
        $this->balance = new BalanceService($this);
        $this->billingGroups = new BillingGroupsService($this);
        $this->bulkSimCardActions = new BulkSimCardActionsService($this);
        $this->bundlePricing = new BundlePricingService($this);
        $this->callControlApplications = new CallControlApplicationsService($this);
        $this->callEvents = new CallEventsService($this);
        $this->calls = new CallsService($this);
        $this->channelZones = new ChannelZonesService($this);
        $this->chargesBreakdown = new ChargesBreakdownService($this);
        $this->chargesSummary = new ChargesSummaryService($this);
        $this->comments = new CommentsService($this);
        $this->conferences = new ConferencesService($this);
        $this->connections = new ConnectionsService($this);
        $this->countryCoverage = new CountryCoverageService($this);
        $this->credentialConnections = new CredentialConnectionsService($this);
        $this->customStorageCredentials = new CustomStorageCredentialsService($this);
        $this->customerServiceRecords = new CustomerServiceRecordsService($this);
        $this->detailRecords = new DetailRecordsService($this);
        $this->dialogflowConnections = new DialogflowConnectionsService($this);
        $this->documentLinks = new DocumentLinksService($this);
        $this->documents = new DocumentsService($this);
        $this->dynamicEmergencyAddresses = new DynamicEmergencyAddressesService($this);
        $this->dynamicEmergencyEndpoints = new DynamicEmergencyEndpointsService($this);
        $this->externalConnections = new ExternalConnectionsService($this);
        $this->faxApplications = new FaxApplicationsService($this);
        $this->faxes = new FaxesService($this);
        $this->fqdnConnections = new FqdnConnectionsService($this);
        $this->fqdns = new FqdnsService($this);
        $this->globalIPAllowedPorts = new GlobalIPAllowedPortsService($this);
        $this->globalIPAssignmentHealth = new GlobalIPAssignmentHealthService($this);
        $this->globalIPAssignments = new GlobalIPAssignmentsService($this);
        $this->globalIPAssignmentsUsage = new GlobalIPAssignmentsUsageService($this);
        $this->globalIPHealthCheckTypes = new GlobalIPHealthCheckTypesService($this);
        $this->globalIPHealthChecks = new GlobalIPHealthChecksService($this);
        $this->globalIPLatency = new GlobalIPLatencyService($this);
        $this->globalIPProtocols = new GlobalIPProtocolsService($this);
        $this->globalIPUsage = new GlobalIPUsageService($this);
        $this->globalIPs = new GlobalIPsService($this);
        $this->inboundChannels = new InboundChannelsService($this);
        $this->integrationSecrets = new IntegrationSecretsService($this);
        $this->inventoryCoverage = new InventoryCoverageService($this);
        $this->invoices = new InvoicesService($this);
        $this->ipConnections = new IPConnectionsService($this);
        $this->ips = new IPsService($this);
        $this->ledgerBillingGroupReports = new LedgerBillingGroupReportsService($this);
        $this->list = new ListService($this);
        $this->managedAccounts = new ManagedAccountsService($this);
        $this->media = new MediaService($this);
        $this->messages = new MessagesService($this);
        $this->messaging = new MessagingService($this);
        $this->messagingHostedNumberOrders = new MessagingHostedNumberOrdersService($this);
        $this->messagingHostedNumbers = new MessagingHostedNumbersService($this);
        $this->messagingNumbersBulkUpdates = new MessagingNumbersBulkUpdatesService($this);
        $this->messagingOptouts = new MessagingOptoutsService($this);
        $this->messagingProfiles = new MessagingProfilesService($this);
        $this->messagingTollfree = new MessagingTollfreeService($this);
        $this->messagingURLDomains = new MessagingURLDomainsService($this);
        $this->mobileNetworkOperators = new MobileNetworkOperatorsService($this);
        $this->mobilePushCredentials = new MobilePushCredentialsService($this);
        $this->networkCoverage = new NetworkCoverageService($this);
        $this->networks = new NetworksService($this);
        $this->notificationChannels = new NotificationChannelsService($this);
        $this->notificationEventConditions = new NotificationEventConditionsService($this);
        $this->notificationEvents = new NotificationEventsService($this);
        $this->notificationProfiles = new NotificationProfilesService($this);
        $this->notificationSettings = new NotificationSettingsService($this);
        $this->numberBlockOrders = new NumberBlockOrdersService($this);
        $this->numberLookup = new NumberLookupService($this);
        $this->numberOrderPhoneNumbers = new NumberOrderPhoneNumbersService($this);
        $this->numberOrders = new NumberOrdersService($this);
        $this->numberReservations = new NumberReservationsService($this);
        $this->numbersFeatures = new NumbersFeaturesService($this);
        $this->operatorConnect = new OperatorConnectService($this);
        $this->otaUpdates = new OtaUpdatesService($this);
        $this->outboundVoiceProfiles = new OutboundVoiceProfilesService($this);
        $this->payment = new PaymentService($this);
        $this->phoneNumberBlocks = new PhoneNumberBlocksService($this);
        $this->phoneNumbers = new PhoneNumbersService($this);
        $this->phoneNumbersRegulatoryRequirements = new PhoneNumbersRegulatoryRequirementsService($this);
        $this->portabilityChecks = new PortabilityChecksService($this);
        $this->porting = new PortingService($this);
        $this->portingOrders = new PortingOrdersService($this);
        $this->portingPhoneNumbers = new PortingPhoneNumbersService($this);
        $this->portouts = new PortoutsService($this);
        $this->privateWirelessGateways = new PrivateWirelessGatewaysService($this);
        $this->publicInternetGateways = new PublicInternetGatewaysService($this);
        $this->queues = new QueuesService($this);
        $this->rcsAgents = new RcsAgentsService($this);
        $this->recordingTranscriptions = new RecordingTranscriptionsService($this);
        $this->recordings = new RecordingsService($this);
        $this->regions = new RegionsService($this);
        $this->regulatoryRequirements = new RegulatoryRequirementsService($this);
        $this->reports = new ReportsService($this);
        $this->requirementGroups = new RequirementGroupsService($this);
        $this->requirementTypes = new RequirementTypesService($this);
        $this->requirements = new RequirementsService($this);
        $this->roomCompositions = new RoomCompositionsService($this);
        $this->roomParticipants = new RoomParticipantsService($this);
        $this->roomRecordings = new RoomRecordingsService($this);
        $this->rooms = new RoomsService($this);
        $this->seti = new SetiService($this);
        $this->shortCodes = new ShortCodesService($this);
        $this->simCardDataUsageNotifications = new SimCardDataUsageNotificationsService($this);
        $this->simCardGroups = new SimCardGroupsService($this);
        $this->simCardOrderPreview = new SimCardOrderPreviewService($this);
        $this->simCardOrders = new SimCardOrdersService($this);
        $this->simCards = new SimCardsService($this);
        $this->siprecConnectors = new SiprecConnectorsService($this);
        $this->storage = new StorageService($this);
        $this->subNumberOrders = new SubNumberOrdersService($this);
        $this->subNumberOrdersReport = new SubNumberOrdersReportService($this);
        $this->telephonyCredentials = new TelephonyCredentialsService($this);
        $this->texml = new TexmlService($this);
        $this->texmlApplications = new TexmlApplicationsService($this);
        $this->textToSpeech = new TextToSpeechService($this);
        $this->usageReports = new UsageReportsService($this);
        $this->userAddresses = new UserAddressesService($this);
        $this->userTags = new UserTagsService($this);
        $this->verifications = new VerificationsService($this);
        $this->verifiedNumbers = new VerifiedNumbersService($this);
        $this->verifyProfiles = new VerifyProfilesService($this);
        $this->virtualCrossConnects = new VirtualCrossConnectsService($this);
        $this->virtualCrossConnectsCoverage = new VirtualCrossConnectsCoverageService($this);
        $this->webhookDeliveries = new WebhookDeliveriesService($this);
        $this->wireguardInterfaces = new WireguardInterfacesService($this);
        $this->wireguardPeers = new WireguardPeersService($this);
        $this->wireless = new WirelessService($this);
        $this->wirelessBlocklistValues = new WirelessBlocklistValuesService($this);
        $this->wirelessBlocklists = new WirelessBlocklistsService($this);
        $this->wellKnown = new WellKnownService($this);
        $this->inexplicitNumberOrders = new InexplicitNumberOrdersService($this);
        $this->mobilePhoneNumbers = new MobilePhoneNumbersService($this);
        $this->mobileVoiceConnections = new MobileVoiceConnectionsService($this);
        $this->messaging10dlc = new Messaging10dlcService($this);
        $this->speechToText = new SpeechToTextService($this);
        $this->organizations = new OrganizationsService($this);
    }

    /** @return array<string,string> */
    protected function authHeaders(): array
    {
        return [...$this->bearerAuth(), ...$this->oauthClientAuth()];
    }

    /** @return array<string,string> */
    protected function bearerAuth(): array
    {
        return $this->apiKey ? ['Authorization' => "Bearer {$this->apiKey}"] : [];
    }

    /** @return array<string,string> */
    protected function oauthClientAuth(): array
    {
        throw new \BadMethodCallException;
    }

    /**
     * @internal
     *
     * @param string|list<string> $path
     * @param array<string,mixed> $query
     * @param array<string,string|int|list<string|int>|null> $headers
     * @param RequestOpts|null $opts
     *
     * @return array{NormalizedRequest, RequestOptions}
     */
    protected function buildRequest(
        string $method,
        string|array $path,
        array $query,
        array $headers,
        mixed $body,
        RequestOptions|array|null $opts,
    ): array {
        return parent::buildRequest(
            method: $method,
            path: $path,
            query: $query,
            headers: [...$this->authHeaders(), ...$headers],
            body: $body,
            opts: $opts,
        );
    }
}
