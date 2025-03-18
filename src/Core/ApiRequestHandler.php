<?
namespace Bellenne\MpStats\Core;
use GuzzleHttp\Client;
use RuntimeException;

class ApiRequestHandler{
    private Client $client;
    private string $token;
    private string $baseUrl;

    public function __construct(string $token, string $baseUrl) {
        $this->client = new Client();
        $this->token = $token;
        $this->baseUrl = $baseUrl;
    }

    public function send(array $endpointConfig, array $queryParams = [], $bodyData = null): array {
        $url = $this->baseUrl . $endpointConfig['endpoint'];
        
        $options = [
            'headers' => [
                'X-Mpstats-TOKEN' => $this->token,
                'Content-Type' => 'application/json',
            ],
            'query' => $queryParams
        ];

        if ($endpointConfig['method'] === 'POST' && $bodyData !== null) {
            $options['json'] = $bodyData;
        }

        try {
            $response = $this->client->request(
                $endpointConfig['method'], 
                $url, 
                $options
            );
            
            return json_decode($response->getBody(), true);
            
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            throw new RuntimeException("API request failed: " . $e->getMessage());
        }
    }
}